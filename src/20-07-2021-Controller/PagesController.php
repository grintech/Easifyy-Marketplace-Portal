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
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        $this->Auth->allow(array('referAFriend','becomeAPsp','becomeAUser','faq','privacyPolicy','index','display','contactQuery','termsOfService','privacyPolicy','trustAndSafety'));
    }

    public function index() {
        
        $this->viewBuilder()->setLayout('frontend');
    
        // Fetch Header Data
            $this->loadModel('Dashboard');
            $bannerQuery = $this->Dashboard->find('all', [
                'conditions' => ['Dashboard.meta_key' => 'banner_data'],
            ]);
            $bannerQuery->disableHydration();
            $bannerData = $bannerQuery->first();
            $bannerData = json_decode($bannerData['meta_value'],true);
        

        //Fetech Home page Sections
            $talentQuery = $this->Dashboard->find('all', [
                'conditions' => ['Dashboard.meta_key' => 'talent_data'],
            ]);
            $talentQuery->disableHydration();
            $talentData = $talentQuery->first();
            $talentData = json_decode($talentData['meta_value'],true);    
            
        // WorkDone
        $workdoneQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'workdone_data'],
        ]);
        $workdoneQuery->disableHydration();
        $workdoneData = $workdoneQuery->first();
        $workdoneData = json_decode($workdoneData['meta_value'],true);

        // affiliateData
        $affiliateQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'affiliate_data'],
        ]);
        $affiliateQuery->disableHydration();
        $affiliateData = $affiliateQuery->first();
        $affiliateData = json_decode($affiliateData['meta_value'],true);
        
        // howItWorksData
        $howItWorksQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'how_it_works'],
        ]);
        $howItWorksQuery->disableHydration();
        $howItWorksData = $howItWorksQuery->first();
        $howItWorksData = json_decode($howItWorksData['meta_value'],true);

        //Fetch Sub categories
            $this->loadModel('Categories');
            
            $ourServiceCategory = $this->Categories->find('all', [
                    'conditions' => [
                        'Categories.status' => 1,
                        'Categories.delete_status' => 1,
                        'Categories.show_in_our_service' => 1
                    ],
                    'fields' => [
                        'image','slug','name'
                    ]
            ]);

            $ourServiceCategory->disableHydration();
            
            $ourServiceCategory = $ourServiceCategory->all();

        //End 

        //Fetch Popular Professional Services
            $this->loadModel('Products');
            $this->loadModel('ProductGalleries');
            
            $ourProfessionalServices = $this->Products->find('all', [
                    'conditions' => [
                        'Products.status' => 1,
                        'Products.delete_status' => 1,
                        'Products.show_popular_professional_services' => 1
                    ],
                    'contain'=> [
                            'ProductGalleries' => [
                                'fields' => [
                                    'ProductGalleries.url',
                                    'ProductGalleries.product_id',
                                ],
                                'conditions' => [
                                    'ProductGalleries.type'=>'featured',
                                ],
                            ],
                        ],
                    
            ]);
            $ourProfessionalServices->disableHydration();
            $ourProfessionalServices = $ourProfessionalServices->all();
        //End   

        //Fetch Featured Popular Professional Services
            $ourFeaturedProfessionalServices = $this->Products->find('all', [
                    'conditions' => [
                        'Products.status' => 1,
                        'Products.delete_status' => 1,
                        'Products.show_in_featured ' => 1
                    ],
                    'fields' => [
                        'title','slug',
                    ]
            ]);
            $ourFeaturedProfessionalServices->disableHydration();
            $ourFeaturedProfessionalServices = $ourFeaturedProfessionalServices->all();

        //End      



        // Fetech Blogs Posts
            $this->loadModel('Blogs');
            
            $ourBlogs = $this->Blogs->find('all',[
                'conditions' => [
                    'Blogs.status' => 1,
                ]
            ])->order(['created' => 'DESC'])->limit(3);

            $ourBlogs->disableHydration();
            
            $ourBlogs = $ourBlogs->all();
            
        //End


        $this->set(compact('bannerData','ourServiceCategory','ourProfessionalServices','ourBlogs',
                            'home_page_sectionsData','ourFeaturedProfessionalServices','talentData',
                            'workdoneData','affiliateData','howItWorksData'));
    }

    public function termsOfService(){
        //dd("here");
        $this->viewBuilder()->setLayout('frontend');
    }
    public function privacyPolicy(){
        //dd("here");
        $this->viewBuilder()->setLayout('frontend');
    }

    public function trustAndSafety(){
        //dd("trustAndSafety");
        $this->viewBuilder()->setLayout('frontend');
    }

    public function faq(){
        //dd("faq");
        $this->loadModel('Faq');
        $faqs =$this->Faq->find()->all();
        $this->set(compact('faqs'));
        $this->viewBuilder()->setLayout('frontend');
    }

    public function becomeAUser(){
        $this->viewBuilder()->setLayout('frontend');
    }

    public function becomeAPsp(){
        $this->viewBuilder()->setLayout('frontend');
    }

    public function referAFriend(){
        $this->viewBuilder()->setLayout('frontend');
    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        
    	$this->viewBuilder()->setLayout('frontend');
        // Fetech Blogs Posts
            $this->loadModel('Articles');
            $ourArticles = $this->Articles->find('all')->limit(3);
            $ourArticles->disableHydration();
            $ourArticles = $ourArticles->all();
            //dd($ourArticles);
        //End

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }

        //Contact Page Form Submit
        if(isset($_POST['formtype'])) {
        	$this->loadModel('ContactUs');
            $contact_us = $this->ContactUs->newEntity();
            $contact['first_name'] = trim($_POST['name']);
            $contact['last_name'] = trim($_POST['surname']);
            $contact['email'] = trim($_POST['email']);
            $contact['Phone'] = trim($_POST['phone']);
            $contact['message'] = trim($_POST['message']);
            $contact_us = $this->ContactUs->patchEntity($contact_us,$contact);
            $this->ContactUs->save($contact_us);
        	$message = 'Hello, Easifyy';
        	$message.= '<br>';
        	$message.= '<br>A New Enquiry have been generated as follow:<br>';
        	$message.= '<br><b>FirstName</b> :'.' '.$_POST['name'];
        	$message.= '<br>';
        	$message.= '<br><b>LastName</b> :'.' '.$_POST['surname'];
        	$message.= '<br>';
        	$message.= '<br><b>Email</b> :'.' '.$_POST['email'];
        	$message.= '<br>';
        	$message.= '<br><b>Phone</b> :'.' '.$_POST['phone'];
        	$message.= '<br>';
        	$message.= '<br><b>Message</b> :'.' '.$_POST['message'];
        
        	$email = new Email();
	        $email
	            ->template('default','easify') //->template('template','layout')
	            ->setViewVars(
	                        [
	                        ]
	                    )
	            ->emailFormat('html')
	            ->from(['connect@easifyy.com' => 'Easifyy'])
	            ->to('easifyy@gmail.com')
	            ->subject('Contact Form Query - Easifyy')
	            ->send($message);

	        $message_reply = 'Hello,'.' '.$_POST['name'];
	        $message_reply.= '<br>';
	        $message_reply.= '<br>';
	        $message_reply.= 'Your Query submitted successfully. Easifyy will contact you shortly';
	        $message_reply.= '<br>';

	        /*$email = new Email();
	        $email
	            ->template('default','easify') //->template('template','layout')
	            ->setViewVars(
	                        [
	                        ]
	                    )
	            ->emailFormat('html')
	            ->from(['connect@easifyy.com' => 'Easifyy'])
	            ->to($_POST['email'])
	            ->subject('Contact Form Query Submitted- Easifyy')
	            ->send($message_reply);  */

	        $status_message= 'Contact Form Submitted successfully.';      

        }

        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage','status_message','ourArticles'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function contactQuery() {
        $this->autoRender = false;
        echo '<pre>';
            print_r($_POST);
        echo '</pre>';
        die('Here');
    }
}
