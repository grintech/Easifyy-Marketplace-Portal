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
define('BASE_URL', "http://dev.rndexperts.in/hopperstock/dev/marketplace/");

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
                    'controller' => 'Users',
                    'action' => 'login',
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

    
    
}
