<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * PaymentMethods Controller
 *
 * @property \App\Model\Table\PaymentMethodsTable $PaymentMethods
 *
 * @method \App\Model\Entity\PaymentMethod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentMethodsController extends AppController
{

    public function getPaymentMethods()
    {
        $this->request->allowMethod(['post', 'put']);
        $paymentMethods = $this->PaymentMethods->find('all', [
            'conditions' => ['PaymentMethods.status' => 1 ] ,
            'fields' => [  'PaymentMethods.id', 'PaymentMethods.name', 'PaymentMethods.description' ]
         ]);
        
        if ( $paymentMethods ) {
            $this->set([
                'payment_method' => $paymentMethods,  
                 'status' => 1,
                '_serialize' => ['status','payment_method']
            ]);
        } else {
            $this->set([
                'status' => 0,
                '_serialize' => ['status']
            ]);
        }
        
        
    }
    
}
