<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategories'],
            'conditions' => [
                    'Categories.delete_status'=>1,
                ],
            'order' => [
                'Categories.id' => 'asc',
                'Categories.menuOrder' => 'asc'
            ]
        ];
        $categories = $this->paginate($this->Categories);

        // $this->regenerateThumb();

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'ChildCategories', 'MerchantProductCategories', 'ProductCategories'],
        ]);

        $this->set('category', $category);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $category = $this->Categories->newEntity();
    //     if ($this->request->is('post')) {
    //         $category = $this->Categories->patchEntity($category, $this->request->getData());
    //         if ($this->Categories->save($category)) {
    //             $this->Flash->success(__('The category has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The category could not be saved. Please, try again.'));
    //     }
    //     $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
    //     $this->set(compact('category', 'parentCategories'));
    // }

    public function add()
    {
        //$multimedia = $this->Multimedia->newEntity(); 
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            //upload script start here
            // $mm_dir = new Folder(WWW_ROOT . 'images/cat-images', true, 0755);
            // $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');

            // move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
            // if(move_uploaded_file($this->request->getData('image.tmp_name'), $target_path)) {
            //     $category->image= $this->request->getData('image.name');

                    
            // } else {
                
            // }
            // $this->uploadImage( $this->request->getData('image') );
            $category->image = $this->uploadImage( $this->request->getData('image') );
            if ( $this->Categories->save($category) ) {
                
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));    
            }
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);
        //$old_image = $category->image;
        $data=$category;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            //1590835649175-382.jpg

            if($this->request->getData('image.name')) {
                unlink(WWW_ROOT . 'images' . DS . 'cat-images' . DS . $data->image );

                $category->image = $this->uploadImage( $this->request->getData('image') );
            } 
                
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
            
             
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
    }

    private function uploadImage( $file )
    {

        if (!empty($file)) {


            $mt = explode(' ', microtime());
            $timechunk = ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
            
            $file_name = $timechunk.'-'.$file['name'];
            $path_parts = pathinfo($file_name);     
            // $file_name = $timechunk.'-'.$file['name'];
            
            //Upload image for Web Site
            $destination = WWW_ROOT . 'images' . DS . 'cat-images' . DS . $file_name;
            move_uploaded_file($file['tmp_name'], $destination);
            //Upload Images for App
            $destination_app = WWW_ROOT . 'images' . DS . 'cat-images' . DS . 'app-images'. DS . $file_name;
            $size=getimagesize($destination);
            copy ( $destination , $destination_app );
            
            //Resixe image to 125*75 resolution
            $new_width=125;
            $new_height=75;
            $width=$size[0];
            $height=$size[1];

            $new_width = 125;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;



            // App Image
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination_app);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination_app);
            }

            // App Image
            $new_width = 250;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;

            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination);
            }

            return $file_name;
        }
    }

    private function regenerateThumb()
    {
        $file = scandir( WWW_ROOT . 'img' . DS . 'product-images' );
        echo "<pre>";
        print_r($file);
        echo "</pre>";

        foreach ($file as $key => $value) {
            if( $value == "." || $value == ".." ) continue;

            $path_parts = pathinfo($value);     
            //Upload image for Web 
            $destination = WWW_ROOT . 'img' . DS . 'product-images' . DS . $value;
            
            //Upload Images for App
            $destination_app = WWW_ROOT . 'img' . DS . 'product-images' . DS . 'app-images'. DS . $value;
            $size=getimagesize($destination);
            copy ( $destination , $destination_app );
            
            //Resixe image to 125*75 resolution
            $new_width=125;
            $new_height=75;
            $width=$size[0];
            $height=$size[1];

            $new_width = 125;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;



            // App Image
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination_app);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination_app);
            }

            // App Image
            $new_width = 250;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;

            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination);
            }

            // return $file_name;
            echo $value."<br>";
        }
        die();
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        $category->delete_status = 0;

        if ($this->Categories->save($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deletecategroyimage($id = null, $link ) {
        
        $category = $this->Categories->get($id);
        $category->image = '';
        if ($this->Categories->save($category)) {

            unlink(WWW_ROOT . 'images' . DS . 'cat-images' . DS . $link);

            $this->Flash->success(__('The category has been updated.'));
        } else {
            $this->Flash->error(__('The category could not be updated. Please, try again.'));
        }    
        return $this->redirect(['action' => 'edit',$id]);   
    }
}
