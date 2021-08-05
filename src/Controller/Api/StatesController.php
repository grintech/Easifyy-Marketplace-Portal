<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * States Controller
 *
 * @property \App\Model\Table\StatesTable $States
 *
 * @method \App\Model\Entity\State[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatesController extends AppController
{
    public function getAllStates()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            
            $states = $this->States->find()
            ->select( [ 'id', 'name' ] );
            // print_r($coupons);

            if ( $states ) {
                 $this->set([
                        'states' => $states,
                         'status' =>1,
                        '_serialize' => ['status','states']
                    ]);
            }else{
                 $this->set([
                        'states' => $states,
                         'status' =>0,
                        '_serialize' => ['status','states']
                    ]);
            }
           
        }
       
    }
}
