<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Table\UsersTable;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ServiceController extends AppController
{
    var $uses = array('Users');
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(array('index','serviceCategories','serviceProducts','view','servicePlanDetail','servicePlan'));;
    }
  
    public function index() {
        //echo $slug;
        $this->loadModel('Categories');
        $query = $this->Categories->find()->where(['parent_id IS' => null ])->limit(12);
        $results = $query->all();
        $this->set('services', $results);
        $this->viewBuilder()->setLayout('service');
    }

    /*public function serviceCategories($title=null){
        $this->loadModel('Categories');
        $query =$this->Categories->find()->select(['id', 'name'])->where(['slug' => $title])->limit(1);
        //$results = $query->all();
        $results = $query->toArray();
        $serviceId=$results[0]['id'];

        $result1 =$this->Categories->find()->where(['parent_id' => $serviceId])->all();
        //print_r($results);
        $this->set('mainService', $title);
        $this->set('services', $result1);
        $this->viewBuilder()->setLayout('service');
    }*/
    public function serviceProducts($title=null){
        $this->loadModel('Categories');
        dd($title);
        $query =$this->Categories->ParentCategories->
            find('all', ['select' => ['id','name']])->where(['slug' => $title])->limit(1);
        $results = $query->all();
        $results = $query->toArray();
        dd($results);
        $categoryId=$results[0]['parent_id'];
        $this->loadModel('ProductCategories');
        $query = $this->ProductCategories->find('all')
                    ->where(['category_id' => $categoryId])
                        ->contain(['Products',
                            'Products.ProductGalleries' => [
                                'fields' => [
                                    'ProductGalleries.product_id',
                                    'ProductGalleries.url',
                                ]
                            ]
                        ])
                    ->limit(12);
        
        $this->set('services', $query);
        $this->viewBuilder()->setLayout('service');
    }
    public function view($title=null)
    {        
        $loggedIn = false;
        $this->loadModel('Products');
        //$result = $this->Products->get($id);
        //echo $results = $query->all();
        $query =$this->Products->find()->where(['slug' => $title])
                    ->contain(['ProductGalleries'])
                    ->limit(1);

        $loguser = $this->request->session()->read('Auth.User');
        if(!empty($loguser)) {
            $loggedIn = true;
        } 
        $result = $query->toArray();
        $imgLink='';
        if(!empty($result[0]['product_galleries'])){
            $imgLink=$result[0]['product_galleries'][0]->url;
        }
        if($imgLink!=''){
            $imgLink='product-images/'.$result[0]['product_galleries'][0]->url;
        }else{
            $imgLink='product-images/logo.png';
        }
        $this->set('loggedIn', $loggedIn);
        $this->set('service', $result);
        $this->set(compact('imgLink'));
        $this->viewBuilder()->setLayout('service');
    }
    public function servicePlan(){
        $this->viewBuilder()->setLayout('service');
    }
    public function servicePlanDetail(){
        $this->viewBuilder()->setLayout('service');
    }
}
