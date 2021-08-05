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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\I18n\Time; 
use Cake\I18n\Date;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\Mailer\Email;
use Cake\View\Helper\BreadcrumbsHelper;

Time::setDefaultLocale('us_US'); // For any mutable DateTime
FrozenTime::setDefaultLocale('us_US'); // For any immutable DateTime
Date::setDefaultLocale('us_US'); // For any mutable Date
FrozenDate::setDefaultLocale('us_US'); // For any immutable Date
Time::setJsonEncodeFormat('dd-MM-yyyy HH:mm a');  // For any mutable DateTime
FrozenTime::setJsonEncodeFormat('dd-MM-yyyy HH:mm a');  // For any immutable DateTime
Date::setJsonEncodeFormat('dd-MM-yy HH:mm a');  // For any mutable Date
FrozenDate::setJsonEncodeFormat('dd-MM-yyyy HH:mm a');  // For any immutable Date

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
define('BASE_URL', "https://easifyy.com/");

class AppController extends Controller
{

    var $unauthMessage = "You are not authorised to perform this action!";

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $usecaptcha = 1;
        
        $this->set('usecaptcha',$usecaptcha); //we can on or off captcha on website 

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        if ($this->request->getParam('prefix') == 'api') {
            //   $this->loadComponent('Auth', [
            //     'authenticate' => [
            //         'Basic' => [
            //             'fields' => ['username' => 'username', 'password' => 'password'],
            //             'userModel' => 'Users'
            //         ],
            //     ],
            //     'storage' => 'Memory',
            //     'unauthorizedRedirect' => false
            // ]);
              
            }else{
              
             $this->loadComponent('Auth', [
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => false
                ],
                'logoutRedirect' => [
                    'controller' => 'Pages',
                    'action' => 'index',
                    'prefix' => false
                ],
                'redirectUrl' => [
                    'controller' => 'Users',
                    'action' => 'dashboard',
                    'home'
                ]
            ]);
              
        }

         if ($this->request->getParam('prefix')) {
            $prefix = $this->request->getParam('prefix');
            switch ($prefix) {
                case 'superadmin':
                    $this->viewBuilder()->setLayout('superadmin');
                    break;
                case 'admin':
                    $this->viewBuilder()->setLayout('admin');
                    break;
                }
        }

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function verifyRecatpcha($aData)
        {
        if(!$aData)
        {
         return true;
        }
        if(isset($aData['g-recaptcha-response']))
        {
         $recaptcha_secret = Configure::read('google_recatpcha_settings.secret_key');
         $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$aData['g-recaptcha-response'];
         $response = json_decode(@file_get_contents($url));  
           
         if($response->success == true)
         {
          return true;
         }
         else
         {
          return false;
         }
        }
        else
        {
         return false;
        }
        }

    protected function sendNotification( $notification_data = [] )
    {

        if ( !isset($notification_data['fcm_token']) || $notification_data['fcm_token'] == "" ) return 0;
        

        // $user = $this->Users->find('all')
        // ->where(['user_id' => $user_id])
        // ->select(['username', 'fcm_token'])
        // ->first();

        $json_data = [
            "to" => $notification_data['fcm_token'],
            "notification" => [
                "body" => $notification_data['body'],
                "title" => $notification_data['title'],
            ]
        ];
        $data = json_encode($json_data);
        $url = 'https://fcm.googleapis.com/fcm/send';
        $server_key = Configure::read('firebase_server_key');
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
            return 0;
        } else {
            return 1;
        }
        curl_close($ch);
    }

    protected function getUserIdByMerchantId($merchant_id=null)
    {
        if( $merchant_id == null ) return 0;
        $this->loadModel('Merchants');

        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.id' => $merchant_id])
        ->select(['user_id'])
        ->first();
        if( $merchant ){
            return $merchant->user_id;
        } else {
            return 0;
        }
    }

    protected function getUserIdByMerchantData($merchant_id=null)
    {
        if( $merchant_id == null ) return 0;
        $this->loadModel('Merchants');

        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.id' => $merchant_id])
        ->select(['username'])
        ->first();
        if( $merchant ){
            return $merchant;
        } else {
            return 0;
        }
    } 

    public function get_user_email($user_id=null) {
        $this->loadModel('Users');
         $user = $this->Users->find()->where(['id' => $user_id])->first();
         if($user){
            return $user['username']."|".$user['first_name'];
         }else{
            return "-";
         }
    }  


    protected function getMerchantIdByUserId($user_id=null)
    {
        if( $user_id == null ) return 0;
        $this->loadModel('Merchants');

        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.user_id' => $user_id])
        ->select(['id'])
        ->first();
        if( $merchant ){
            return $merchant->id;
        } else {
            return 0;
        }
    }

    public function get_merchant_name($merchant_id=null) {
        $user_id = $this->Auth->user('id');
        $merchant_id ='';
        $this->loadModel('Merchants');
         $merchant = $this->Merchants->find()->where(['id' => $merchant_id])->first();
         if($merchant){
            return $merchant['store_name'].$merchant['last_name'];
         }
        return $merchant_id;
    }

    protected function getFcmToken($user_id=null)   
    {
        $this->loadModel('Users');
        $user = $this->Users->find('all')
        ->where(['id' => $user_id])
        ->select(['fcm_token'])
        ->first();
        if( $user ) {
            return $user->fcm_token;
        } else {
            return false;
        }
    }
    protected function assignMerchant($order ) {
        $this->loadModel('Products');
        $this->loadModel('Merchants');
        $this->loadModel('OrderInvitation');
        $serviceID = $order->product_id;
        
        $query = $this->Products->find('all', [
            'conditions' => ['Products.parent_id' => $serviceID,'Products.status' => 4,'Products.delete_status' => 1],
            'contain' => [
                'Merchants' => [
                    'fields' => [
                        'Merchants.id',
                        'Merchants.user_id',
                        'Merchants.username',
                        'Merchants.store_name'
                    ]
                ]
            ],
            'fields' =>['author','title','slug','id','description','service_coverd','service_target','service_process','service_guide']
        ]);
        $query->disableHydration();
        $row = $query->all();
        
        $data=array();
        $data['order']=$order;
        
        $this->loadModel('Dashboard');
        $psp_query = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'psp_assignment'],
        ]);
        $psp_query->disableHydration();
        $psp_row = $psp_query->first();
        foreach ($row as $value) {
            $vendor_user_email=$value['merchants'][0]['username'];
            $data['service']=$value;
            if($vendor_user_email != '') {
                if($psp_row['meta_value']=='automatically') {
                    /* order Invitation starts here*/
                    $orderInvitation = $this->OrderInvitation->newEntity();
                    $orderInvitation->user_id=$value['merchants'][0]['user_id'];
                    $orderInvitation->order_id=$order->id;
                    $orderInvitation->view_status= 0; 
                    $this->OrderInvitation->save($orderInvitation);
                    /* order Invitation ends here*/
                    $this->sendEmail($vendor_user_email,'message','default','New Job Invitation',$data);        
                }
            }
        }
        
    }

    protected function assignMerchantManual($order,$merchants ) {
        // echo '<pre>'; print_r($merchants); echo '</pre>';
        $this->loadModel('Products');
        $this->loadModel('Merchants');
        $this->loadModel('OrderInvitation');
        $serviceID = $order->product_id;
        
        $query = $this->Products->find('all', [
            'conditions' => ['Products.parent_id' => $serviceID,'Products.delete_status'=>1],
            'contain' => [
                'Merchants' => [
                    'fields' => [
                        'Merchants.id',
                        'Merchants.user_id',
                        'Merchants.username',
                        'Merchants.store_name'
                    ]
                ]
            ],
            'fields' =>['author','title','slug','id','description','service_coverd','service_target','service_process','service_guide']
        ]);
        $query->disableHydration();
        $row = $query->all();
        
        
        $data=array();
        $data['order']=$order;
        
        $this->loadModel('Dashboard');
        $psp_query = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'psp_assignment'],
        ]);
        $psp_query->disableHydration();
        $psp_row = $psp_query->first();
        //echo '<pre>'; print_r($row); echo '</pre>------------';
        foreach ($row as $value) {
            //echo '<pre>'; print_r($merchants); echo '</pre>';
            $merchants=str_replace("[","",$merchants);
            $merchants=str_replace("]","",$merchants);
            $merchants_list=explode( ',', $merchants);
            //echo '<pre>'; print_r($merchants_list); echo '</pre>';
            if(!empty($value['merchants'])) {
                $vendor_user_email=$value['merchants'][0]['username'];
                //echo '<pre>'.$vendor_user_email.'--'.$value['merchants'][0]['id'].'</pre>';
                $data['service']=$value;
                if($vendor_user_email != '') {
                    //if (in_array('"'.$value['merchants'][0]['id'].'"', $merchants_list)) {
                    if (in_array('"'.$value['merchants'][0]['id'].'"', $merchants_list, true)) {
                        /* order Invitation starts here*/
                        $orderInvitation = $this->OrderInvitation->newEntity();
                        $orderInvitation->user_id=$value['merchants'][0]['user_id'];
                        $orderInvitation->order_id=$order->id;
                        $orderInvitation->view_status= 0; 
                        $this->OrderInvitation->save($orderInvitation);
                        /* order Invitation ends here*/

                        $this->sendEmail($vendor_user_email,'message','default','New Job Invitation',$data);
                    } else {
                        echo 'Not Found';
                    }
                }
            }
        }
    }

    public function sendOrderEmails($order) {
        $this->loadModel('Cities');
        $this->loadModel('States');

        $cityId=$order->user->addresses[0]->city_id;
        $stateId=$order->user->addresses[0]->state_id;
        $userCity = $this->Cities->find()->where(['id' =>$cityId])->first()['name'];
        $userState = $this->States->find()->where(['id' =>$stateId])->first()['name'];
        include '/var/www/easifyy.com/html/easifyy/src/Template/Users/viewpdf.ctp';
        $output=str_replace("1/","",$output);
        $output='/'.$output;
        
        //$this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
            ->template('easify-order-email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'test',
                            'job_title' => $order->product->title,
                            'job_slug' => $order->product->slug,
                            'job_description' => $order->product->description,
                            'job_coverd' => $order->product->service_coverd,
                            'job_target' => $order->product->service_target,
                            'job_process' => $order->product->service_process,
                            'job_guide' => $order->product->service_guide,
                            'job_price' => $order->gross_total,
                            'job_link' => BASE_URL.'/service-details/'.$order->product->slug,
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username)
            ->bcc('easifyy@gmail.com')
            ->subject('Order Placed successfully - Easifyy')
            ->send($msg);       
    }   

    public function sendEmail($UserEmail,$msg,$type,$subject,$data){
       
        $this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
            ->template('easify-inviation','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => $data['service']['merchants'][0]['store_name'],
                            'job_title' => $data['service']['title'],
                            'job_slug' => $data['service']['slug'],
                            'job_description' => $data['service']['description'],
                            'job_coverd' => $data['service']['service_coverd'],
                            'job_target' => $data['service']['service_target'],
                            'job_process' => $data['service']['service_process'],
                            'job_guide' => $data['service']['service_guide'],
                            'job_price' => $data['order']->gross_total,
                            'job_link' => BASE_URL.'/service-details/'.$data['service']['slug'],
                            'job_invitation' => BASE_URL.'/users/jobInvitaion/?serviceid='.base64_encode($data['service']['id'],).'&mid='.base64_encode($data['service']['merchants'][0]['id']).'&oid='.base64_encode($data['order']->id),
                            'job_reject' => BASE_URL.'/users/jobReject/?serviceid='.base64_encode($data['service']['id'],).'&mid='.base64_encode($data['service']['merchants'][0]['id']).'&oid='.base64_encode($data['order']->id),

                        ]
                    )
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($UserEmail)
            ->bcc('easifyy@gmail.com')
            ->subject('New Service Invitation - Easifyy')
            ->send($msg);
    }

    public function sendOrderNotesEmails($userEmail,$userName,$subject,$message) {
        
        //$this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
            ->template('easify-new-msg','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'userName' => $userName,
                            'subject' => $subject,
                            'message' => $message,
                        ]
                    )
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($userEmail)
            ->bcc('easifyy@gmail.com')
            ->subject($subject.'- Easifyy')
            ->send($msg);       
    }   

    public function sendPaymentRequestMail($userEmail,$subject,$message) {
        
        //$this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
            ->template('easify-payment-respone','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'message' => $message,
                        ]
                    )
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($userEmail)
            ->bcc('easifyy@gmail.com')
            ->bcc('vinit.grintech@gmail.com')
            ->subject($subject.'- Easifyy')
            ->send($message);       
    } 

    public function generatePDF() {
        die('Here');
    }

    public function displaywords($number){
        $no = (int)floor($number);
        $point = (int)round(($number - $no) * 100);
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
         '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
         '7' => 'seven', '8' => 'eight', '9' => 'nine',
         '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
         '13' => 'thirteen', '14' => 'fourteen',
         '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
         '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
         '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
         '60' => 'sixty', '70' => 'seventy',
         '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
          $divider = ($i == 2) ? 10 : 100;
          $number = floor($no % $divider);
          $no = floor($no / $divider);
          $i += ($divider == 10) ? 1 : 2;
     
     
          if ($number) {
             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
             $str [] = ($number < 21) ? $words[$number] .
                 " " . $digits[$counter] . $plural . " " . $hundred
                 :
                 $words[floor($number / 10) * 10]
                 . " " . $words[$number % 10] . " "
                 . $digits[$counter] . $plural . " " . $hundred;
          } else $str[] = null;
       }
       $str = array_reverse($str);
       $result = implode('', $str);
     
     
       if ($point > 20) {
         $points = ($point) ?
           "" . $words[floor($point / 10) * 10] . " " . 
               $words[$point = $point % 10] : ''; 
       } else {
           $points = $words[$point];
       }
       if($points != ''){        
            return $result . "Rupees  " . $points . " Paise Only";
       } else {
            return $result . "Rupees Only";
       }
     
    }   

    
}
