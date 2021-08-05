<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {

            $_FILES['image']['name']=time().'-'.$_FILES['image']['name'];
            $this->uploadImageArticle();
            $data=$this->request->getData();
            $data['image']=$_FILES['image']['name']; 
            $data['slug']=$this->slugify($data['title']); 

            $article = $this->Articles->patchEntity($article, $data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    public function uploadImageArticle() {

        $path=WWW_ROOT ."img/articles/";
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
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data=$this->request->getData();
            if ($_FILES['image']['name']=="") {
                $data['image']=$this->request->getData('pre_image'); 
            }else{
                $_FILES['image']['name']=time().'-'.$_FILES['image']['name'];
                $this->uploadImageArticle();
                $data['image']=$_FILES['image']['name']; 
            }
            $article = $this->Articles->patchEntity($article, $data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
