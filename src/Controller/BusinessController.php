<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\Query;
/**
 * Business Controller
 *
 *
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        $this->Auth->allow(array('index','package','pacakges','savepackagequery'));
    }

    public function index()
    {
        $this->viewBuilder()->setLayout('service');
    }
    public function package($title=null)
    {
        $this->loadModel('BusinessSupport');
        $data =  $this->BusinessSupport->find('all')->where(['slug' => $title])->toArray();
        $title=($data[0]['name']);
        $description=($data[0]['description']);
        $this->set(compact('description','title'));
        $this->viewBuilder()->setLayout('service');
    }
   
    public function savepackagequery($title=null)
    {
        
        if ($this->request->is('post')) {
            $this->loadModel('ContactUs');
            //dd(($this->request));
            $contact_us = $this->ContactUs->newEntity();
            $contact['first_name'] = trim($this->request->getData('first_name'));
            $contact['last_name'] = trim($this->request->getData('last_name'));
            $contact['email'] = trim($this->request->getData('username'));
            $contact['Phone'] = trim($this->request->getData('phone_Code_1')).trim($this->request->getData('phone'));
            $contact['message'] = trim($this->request->getData('comment'));
            $contact['business_name'] = trim($this->request->getData('business-package'));
            $contact['business_support'] = 1;
            $contact_us = $this->ContactUs->patchEntity($contact_us,$contact);
            $this->ContactUs->save($contact_us);
            $this->Flash->success(__('Request has been sent Successfully .'));
            return $this->redirect($this->referer());
        }

    }
    public function pacakges()
    {
        $this->loadModel('ProductCategories');
        $query = $this->ProductCategories->find('all')
                    ->contain(['Products'])
                    ->order('rand()')
                    ->limit(15);
        $relatedServices = $query->toArray();
        //dd($relatedServices);
        $this->loadModel('Products');
        $query =$this->Products->find()->where(['slug' => "public-limited-company-registration"])
        ->contain(['ProductGalleries','ProductFaq','ProductReviews','ProductCategories'])
        ->limit(1);
        $result = $query->toArray();
        $this->set('rService', $result);
        //dd($result);
        $this->set('pacakges', $relatedServices);
        $this->viewBuilder()->setLayout('frontend');
    }

}
