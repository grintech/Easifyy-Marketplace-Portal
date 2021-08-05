<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * CartItems Controller
 *
 * @property \App\Model\Table\CartItemsTable $CartItems
 *
 * @method \App\Model\Entity\CartItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartItemsController extends AppController
{

	public function checkWishlist()
	{
		$this->loadModel('Wishlists');
		$this->request->allowMethod(['post', 'put']);
        
        $user_id = base64_decode($this->request->getData('user_id'));
        $merchant_id = base64_decode($this->request->getData('merchant_id'));
        $merchant_product_id = base64_decode($this->request->getData('merchant_product_id'));

        $wishlist =$this->Wishlists->find('all',[ 
            'conditions' =>[
            	'Wishlists.user_id' => $user_id,
            	'Wishlists.merchant_id' => $merchant_id,
            	'Wishlists.merchant_product_id' => $merchant_product_id
           	]
        ])->first();

        if( $wishlist ) {
        	$this->set([
	            'status' => 1,
	            '_serialize' => ['status']
	        ]);	
        } else {
        	$this->set([
	            'status' => 0,
	            '_serialize' => ['status']
	        ]);
        }

	}

	public function getAllWishlist()
	{
		$this->loadModel('Wishlists');
		$this->request->allowMethod(['post', 'put']);
        
        $user_id = base64_decode($this->request->getData('user_id'));

        $wishlist =$this->Wishlists->find()
        ->contain( [ 'MerchantProducts' ] )
        ->select( ['MerchantProducts.title', 'MerchantProducts._price', 'MerchantProducts._sale_price', 'MerchantProducts.id'] )
        ->where([ 
            'Wishlists.user_id' => $user_id,
           	
        ]);

        if( $wishlist ) {
        	$this->set([
	            'status' => 1,
	            'wishlist' => $wishlist,
	            '_serialize' => ['status', 'wishlist']
	        ]);	
        } else {
        	$this->set([
	            'status' => 0,
	            'wishlist' => $wishlist,
	            '_serialize' => ['status','wishlist']
	        ]);
        }

	}

	public function getWishlistProduct()
	{
		$this->loadModel('Wishlists');
		$this->request->allowMethod(['post', 'put']);
        
        $id = base64_decode($this->request->getData('id'));

        if( $id == null || $id <= 0 ) {
        	$this->set([
	            'status' => 0,
	            'wishlist' => 'Error',
	            '_serialize' => ['status','wishlist']
	        ]);
	        die();
        }

        $wishlist =$this->Wishlists->find()
        ->contain( [ 'MerchantProducts', 'MerchantProducts.ChildMerchantProducts', 'MerchantProducts.MerchantProductGalleries', 'MerchantProducts.MerchantProductCategories' ] )
        ->where([ 
            'Wishlists.id' => $id,
           	
        ]);

        if( $wishlist ) {
        	$this->set([
	            'status' => 1,
	            'wishlist' => $wishlist,
	            '_serialize' => ['status', 'wishlist']
	        ]);	
        } else {
        	$this->set([
	            'status' => 0,
	            'wishlist' => $wishlist,
	            '_serialize' => ['status','wishlist']
	        ]);
        }

	}
    
    public function addRemoveToWishlist()
    {
        
        $this->loadModel('Wishlists');
        $this->request->allowMethod(['post', 'put']);
        
        $user_id = base64_decode($this->request->getData('user_id'));
        $merchant_id = base64_decode($this->request->getData('merchant_id'));
        $merchant_product_id = base64_decode($this->request->getData('merchant_product_id'));
        
        $wishlist =$this->Wishlists->find('all',[ 
            'conditions' =>[ 'Wishlists.user_id' => $user_id, 'Wishlists.merchant_id' => $merchant_id, 'Wishlists.merchant_product_id' => $merchant_product_id ]
        ])->first();
        
        if( $wishlist ) {
        	$wishlist = $this->Wishlists->get( $wishlist->id );
        	if( $this->Wishlists->delete($wishlist) ) {
        		$this->set([
			        'message' => "Product removed from wishlist.",  
			         'status' => 1,
			        '_serialize' => ['status','message']
			    ]);
        	} else {
        		$this->set([
			        'message' => "Unable to remove the product. Try later.",  
			         'status' => 0,
			        '_serialize' => ['status','message']
			    ]);
        	}
        } else {
        	
        	$wishlist = $this->Wishlists->newEntity();
        	$wishlist = $this->Wishlists->patchEntity($wishlist, $this->request->getData());
        	
        	$wishlist->user_id = $user_id;
        	$wishlist->merchant_id = $merchant_id;
        	$wishlist->merchant_product_id = $merchant_product_id;

        	if( $this->Wishlists->save($wishlist) ){
        		$this->set([
			        'message' => "Product added to wishlist.",  
			         'status' => 1,
			        '_serialize' => ['status','message']
			    ]);
        	} else {
        		$this->set([
			        'message' => "Unable to add product. Try later.",  
			         'status' => 0,
			        '_serialize' => ['status','message']
			    ]);
        	}
        }

        
    }
    

    public function getallcartitems()
    {
        
        $this->request->allowMethod(['post', 'put']);
        $user_id = $this->request->getData('id');
        $cartItems =$this->CartItems->find('all',[ 
            'contain' => ['MerchantProducts'], 
            'conditions' =>['CartItems.user_id' => $user_id]
        ]);

        if( $cartItems ) {
        	$this->set([
	            'cartItems' => $cartItems,  
	             'status' => 1,
	            '_serialize' => ['status','cartItems']
	        ]);	
        } else {
        	$this->set([
	            'cartItems' => $cartItems,  
	             'status' => 0,
	            '_serialize' => ['status','cartItems']
	        ]);
        }
        
    }

    public function addtocart()
    {
        $this->request->allowMethod(['post', 'put']);
        $cartItem = $this->CartItems->newEntity();
        
        if ($this->request->is('post')) {
            
            $user_id = base64_decode( $this->request->getData('user_id') );
            $product_id = base64_decode( $this->request->getData('merchant_product_id') );
            $merchant_id = base64_decode( $this->request->getData('merchant_id') );
            
            $cart = $this->CartItems->find('all', [
                'conditions' => [
                    'user_id' => $user_id,
                    'merchant_product_id' => $product_id
                ]
            ])->toArray();

            $cartItem = $this->CartItems->patchEntity($cartItem, $this->request->getData());
            if( $cart ){
                $cartItem->id = $cart[0]['id'];
            }

            $cartItem->user_id = $user_id;
            $cartItem->merchant_product_id = $product_id;
            $cartItem->merchant_id = $merchant_id;

            if ( $this->CartItems->save($cartItem) ) {
                $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 1,
                    '_serialize' => ['status','cartItem']
                ]);
            }else{
                $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 0,
                    '_serialize' => ['status','cartItem']
                ]);
            }
            
        }
        
    }


    public function updateCart()
    {
        $this->request->allowMethod(['post', 'put']);

        if ($this->request->is('post')) {
            
            $user_id = $this->request->getData('user_id');
            $product_id =$this->request->getData('merchant_product_id');
            
            $cartItem = $this->CartItems->find()
            ->where(['user_id' => $user_id, 'merchant_product_id' => $product_id])
            ->first();

            if( $cartItem ){
                $cartItem = $this->CartItems->patchEntity($cartItem, $this->request->getData());
            if ($this->CartItems->save($cartItem)) {
                $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 1,
                    '_serialize' => ['status','cartItem']
                ]);
            }else{
                $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 0,
                    '_serialize' => ['status','cartItem']
                ]);
            }
            }else{
                $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 0,
                    '_serialize' => ['status','cartItem']
                ]);
            }
            
            
        }
        
    }

    public function removefromcart()
    {
        $this->request->allowMethod(['post', 'delete']);
            $user_id = base64_decode($this->request->getData('user_id'));
            $product_id = base64_decode($this->request->getData('merchant_product_id'));

            // print_r($this->request->getData());
            // print_r($product_id);


            $cartItem = $this->CartItems->find()
            ->where(['user_id' => $user_id, 'merchant_product_id' => $product_id])
            ->first();
        if ($this->CartItems->delete($cartItem)) {
            $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 1,
                    '_serialize' => ['status','cartItem']
                ]);
        } else {
            $this->set([
                    'cartItem' => $cartItem,  
                     'status' => 0,
                    '_serialize' => ['status','cartItem']
                ]);
        }

       
    }

    public function clearCart()
    {
        $this->request->allowMethod(['post', 'delete']);
        $deleteFlag = false;
        $user_id = base64_decode( $this->request->getData('user_id') );
        $cartItems = $this->CartItems->find()
            ->where([ 'user_id' => $user_id ])
            ->all();
        if($cartItems){
            foreach ($cartItems as $cartItem) {
                $user_id = $cartItem['user_id'];
                $deleteCartItem = $this->CartItems->get($cartItem['id']);
                if ($this->CartItems->delete($deleteCartItem) ) {
                   $deleteFlag = true;
                }
            }
	        if ($deleteFlag) {
	            $this->set([
                    'cartItems' => [],  
                     'status' => 1,
                    '_serialize' => ['status','cartItems']
                ]);
	        } else {
	            $this->set([
	                    'cartItem' => $cartItem,  
	                     'status' => 0,
	                    '_serialize' => ['status','cartItem']
	                ]);
	        }
	    } else {
	    	$this->set([  
	                     'status' => 0,
	                    '_serialize' => ['status']
	                ]);
	    }

       
    }

    public function syncCartWithApp()
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $saveFlag = false;
        $user_id='';
        $merchant_id='';
        foreach ($this->request->getData() as $key => $cartItem) {
            $user_id = $cartItem['user_id'];
            $merchant_id =$cartItem['merchant_id'];
            $merchant_product_id =$cartItem['merchant_product_id'];
            $cartItemFind = $this->CartItems->find()
            ->where(['user_id' => $user_id, 'merchant_id' => $merchant_id,'merchant_product_id' => $merchant_product_id])
            ->first();
            if($cartItemFind){
                 $cartItemSave = $this->CartItems->patchEntity($cartItemFind, $cartItem);
            }else{
                $cartItemNew = $this->CartItems->newEntity();
                $cartItemSave = $this->CartItems->patchEntity($cartItemNew, $cartItem);
            }
            if ($this->CartItems->save($cartItemSave)) {
                $saveFlag = true;
            } 
        }

        if ( $saveFlag ) {
            $cartItems = $this->CartItems->find()
            ->where(['user_id' => $user_id, 'merchant_id' => $merchant_id])
            ->all();
            $this->set([
                    'cartItems' => $cartItems,  
                     'status' => 1,
                    '_serialize' => ['status','cartItems']
                ]);
        } else {
            $this->set([  
                     'status' => 0,
                    '_serialize' => ['status']
                ]);
        } 
    }


    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'Users', 'MerchantProducts'],
        ];
        $cartItems = $this->paginate($this->CartItems);

        $this->set(compact('cartItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartItem = $this->CartItems->get($id, [
            'contain' => ['Merchants', 'Users', 'MerchantProducts'],
        ]);

        $this->set('cartItem', $cartItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartItem = $this->CartItems->newEntity();
        if ($this->request->is('post')) {
            $cartItem = $this->CartItems->patchEntity($cartItem, $this->request->getData());
            if ($this->CartItems->save($cartItem)) {
                $this->Flash->success(__('The cart item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart item could not be saved. Please, try again.'));
        }
        $merchants = $this->CartItems->Merchants->find('list', ['limit' => 200]);
        $users = $this->CartItems->Users->find('list', ['limit' => 200]);
        $merchantProducts = $this->CartItems->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('cartItem', 'merchants', 'users', 'merchantProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartItem = $this->CartItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartItem = $this->CartItems->patchEntity($cartItem, $this->request->getData());
            if ($this->CartItems->save($cartItem)) {
                $this->Flash->success(__('The cart item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart item could not be saved. Please, try again.'));
        }
        $merchants = $this->CartItems->Merchants->find('list', ['limit' => 200]);
        $users = $this->CartItems->Users->find('list', ['limit' => 200]);
        $merchantProducts = $this->CartItems->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('cartItem', 'merchants', 'users', 'merchantProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartItem = $this->CartItems->get($id);
        if ($this->CartItems->delete($cartItem)) {
            $this->Flash->success(__('The cart item has been deleted.'));
        } else {
            $this->Flash->error(__('The cart item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
