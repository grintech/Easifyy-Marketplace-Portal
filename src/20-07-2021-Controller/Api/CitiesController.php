<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{
    public function getAllCities()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            
            $statecode = base64_decode( $this->request->getData('statecode') );
            $cities = $this->Cities->find()
            ->select( [ 'id', 'name' ] )
            ->where( [ 'statecode' => $statecode ] );
            // print_r($coupons);

            if ( $cities ) {
                 $this->set([
                        'cities' => $cities,
                         'status' =>1,
                        '_serialize' => ['status','cities']
                    ]);
            }else{
                 $this->set([
                        'cities' => $cities,
                         'status' =>0,
                        '_serialize' => ['status','cities']
                    ]);
            }
           
        }
       
    }
	
	public function getCityName(){
		$this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            
            $city_id = $this->request->getData('city');
            $city = $this->Cities->find()
            ->select( [ 'name' ] )
            ->where( [ 'id' => $city_id ] )
			->first();
            //print_r($city);

            if ( $city ) {
                 $this->set([
                        'city' => $city,
                         'status' =>1,
                        '_serialize' => ['status','city']
                    ]);
            }else{
                 $this->set([
                        'city' => $city,
                         'status' =>0,
                        '_serialize' => ['status','city']
                    ]);
            }
           
        }
	}

	public function getCityId(){
		$this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            
            $city_name = $this->request->getData('city_name');
            $city = $this->Cities->find()
            ->select( [ 'id' ] )
            ->where( [ 'name' => $city_name ] )
			->first();
            //print_r($city);

            if ( $city ) {
                 $this->set([
                        'city' => $city,
                         'status' =>1,
                        '_serialize' => ['status','city']
                    ]);
            }else{
                 $this->set([
                        'city' => $city,
                         'status' =>0,
                        '_serialize' => ['status','city']
                    ]);
            }
           
        }
	}
}
