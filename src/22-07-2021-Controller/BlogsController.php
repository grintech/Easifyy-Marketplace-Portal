<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 *
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        $this->Auth->allow(array('index' ,'view','category'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('service');
        //dd('a');
        $blogs = $this->paginate($this->Blogs, array(
            'conditions' => [
                'Blogs.status'=>1,
            ],
            'order'=>array('Blogs.created' => 'desc')));
        $blogCategories = $this->Blogs->BlogCategories->find('all', ['limit' => 200])->toArray();
        
        //dd($blogCategories);
        $this->set(compact('blogs','blogCategories'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function allBlogs()
    {
        $user_id = $this->Auth->user('id');
        $this->viewBuilder()->setLayout('user');
        $blogs = $this->paginate($this->Blogs, array(
            'conditions' => [
                'Blogs.user_id'=>$user_id,
            ],
            'order'=>array('Blogs.created' => 'desc')));

        $this->set(compact('blogs'));
    }


    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug)
    {
        $this->viewBuilder()->setLayout('service');
        
        $ourBlog = $this->Blogs->find('all', [
                'conditions' => [
                    'Blogs.slug' => $slug,
                    'Blogs.status' => 1,
                ]
        ]);

        $ourBlog->disableHydration();
        
        $ourBlog = $ourBlog->first();

        $this->set('ourBlog', $ourBlog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('BlogCategories');
        $blog = $this->Blogs->newEntity();
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);

        $user_id = $this->Auth->user('id');
        $this->viewBuilder()->setLayout('user');
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $_FILES['image']['name']=time().'-'.$_FILES['image']['name'];

            $this->uploadImageBlog();
            
            $data=$this->request->getData();
            
            $data['image']=$_FILES['image']['name']; 
            
            $data['slug']=$this->slugify($data['title']); 
            
            $blog = $this->Blogs->patchEntity($blog, $data);

            //$blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'allBlogs']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $this->set(compact('blog','user_id','blogCategories'));
    }

    public function uploadImageBlog() {

        $path=WWW_ROOT ."img/blogs/";
        $this->autoRender = false;

        if (!empty($_FILES)) {
            $extension=array("jpeg","jpg","png","gif","pdf","txt",'.doc');
            foreach($_FILES as $key=>$tmp_name) {
                $file_name=$_FILES[$key]["name"];
                $file_tmp=$_FILES[$key]["tmp_name"];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                
                if (is_dir($path)==false){
                  mkdir($path);
                }

                if(in_array($ext,$extension)) {
                    /*if(!file_exists(WWW_ROOT ."img/kyc-documents/".$file_name)) {
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$newFileName);
                    }*/
                    if(!file_exists($path.$file_name)) {
                        move_uploaded_file($file_tmp, $path.$file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, $path.$newFileName);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }
    }

    public function category($slug="")
    {
        $this->loadModel('BlogCategories');
        $this->viewBuilder()->setLayout('service');
        $ourBlogs = $this->BlogCategories->find('all',[
            'contain'=>['Blogs'],
            'conditions' => [
                'BlogCategories.slug' => $slug,
            ]
        ])->all()->toArray();
        /*$ourBlogs = $this->BlogCategories->find('all',[
            'contain'=>['Blogs'],
            'conditions' => [
                'BlogCategories.slug' => $slug,
            ]
        ])->all();*/
        //dd($ourBlogs);
        $this->set(compact('ourBlogs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_id = $this->Auth->user('id');
        $this->loadModel('BlogCategories');
        $blog = $this->Blogs->get($id, [
            'contain' => [],
        ]);
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);
        $this->viewBuilder()->setLayout('user');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data=$this->request->getData();
            //dd($_FILES);
            if ($_FILES['image']['name']=="") {
                $data['image']=$this->request->getData('pre_image'); 
            }else{
                $_FILES['image']['name']=time().'-'.$_FILES['image']['name'];
                $this->uploadImageBlog();
                $data['image']=$_FILES['image']['name']; 
            }
            $blog = $this->Blogs->patchEntity($blog, $data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));

                return $this->redirect(['action' => 'allBlogs']);
            }
            $this->Flash->error(__('The blog could not be saved. Please, try again.'));
        }
        $this->set(compact('blog','user_id','blogCategories'));
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
  
        // trim
        $text = trim($text, '-');
  
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
  
        // lowercase
        $text = strtolower($text);
  
        if (empty($text)) {
          return 'n-a';
        }
  
        return $text;
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The blog has been deleted.'));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'allBlogs']);
    }
}
