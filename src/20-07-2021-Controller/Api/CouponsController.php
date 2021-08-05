<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Coupons Controller
 *
 * @property \App\Model\Table\CouponsTable $Coupons
 *
 * @method \App\Model\Entity\Coupon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponsController extends AppController
{

    public function getAllSuperadminCoupons()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            
            $coupons = $this->Coupons->find()
            ->select( [ 'id', 'coupon_code', 'description', 'max_amount' ] )
            ->where( [ 'Coupons.merchant_id IS NULL' ] );
            

            if ( $coupons ) {
                 $this->set([
                        'coupons' => $coupons,
                         'status' =>1,
                        '_serialize' => ['status','coupons']
                    ]);
            }else{
                 $this->set([
                        'coupons' => $coupons,
                         'status' =>0,
                        '_serialize' => ['status','coupons']
                    ]);
            }
           
        }
       
    }


    public function validatecoupon()
    {
        $couponcode = $this->request->getData('couponcode');
        $currentDate= $now = Time::now();
        $message ='';
        $this->request->allowMethod(['post', 'put']);
        $coupon = $this->Coupons->find('all', [
            'contain' => [],
            'conditions' => [ 'coupon_code' => $couponcode ]
        ])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ( $coupon) {
                if (!$coupon->expire->isPast()) {
                $message = 'Coupon is Valid';
                $this->set([
                        'coupon' => $coupon,
                        'message' => $message,
                         'status' =>1,
                        '_serialize' => ['status','coupon','message']
                    ]);
            } else {
                $message = 'Coupon is Expired';
                $this->set([
                        'message' => $message,
                         'status' =>0,
                        '_serialize' => ['status','message']
                    ]);
            }
            }else{
                $message ="Coupon is Invalid";
                $this->set([
                        'message' => $message,
                         'status' =>0,
                        '_serialize' => ['status','message']
                    ]);

            }
           
        }
        
    }


    public function getHomeCoupon()
    {
        $id =2;
        $coupon = $this->Coupons->get($id, [
            'contain' => [],
        ]);
         $this->set([
            'coupon' => $coupon,
             'status' =>1,
            '_serialize' => ['status','coupon']
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants'],
        ];
        $coupons = $this->paginate($this->Coupons);

        $this->set(compact('coupons'));
    }


    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['Merchants', 'Orders'],
        ]);

        $this->set('coupon', $coupon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $merchants = $this->Coupons->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('coupon', 'merchants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__('The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon could not be saved. Please, try again.'));
        }
        $merchants = $this->Coupons->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('coupon', 'merchants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__('The coupon has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
