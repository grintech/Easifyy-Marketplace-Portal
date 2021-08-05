<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * CouponRedeems Controller
 *
 * @property \App\Model\Table\CouponRedeemsTable $CouponRedeems
 *
 * @method \App\Model\Entity\CouponRedeem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponRedeemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Coupons', 'Orders'],
        ];
        $couponRedeems = $this->paginate($this->CouponRedeems);

        $this->set(compact('couponRedeems'));
    }

    /**
     * View method
     *
     * @param string|null $id Coupon Redeem id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $couponRedeem = $this->CouponRedeems->get($id, [
            'contain' => ['Users', 'Coupons', 'Orders'],
        ]);

        $this->set('couponRedeem', $couponRedeem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $couponRedeem = $this->CouponRedeems->newEntity();
        if ($this->request->is('post')) {
            $couponRedeem = $this->CouponRedeems->patchEntity($couponRedeem, $this->request->getData());
            if ($this->CouponRedeems->save($couponRedeem)) {
                $this->Flash->success(__('The coupon redeem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon redeem could not be saved. Please, try again.'));
        }
        $users = $this->CouponRedeems->Users->find('list', ['limit' => 200]);
        $coupons = $this->CouponRedeems->Coupons->find('list', ['limit' => 200]);
        $orders = $this->CouponRedeems->Orders->find('list', ['limit' => 200]);
        $this->set(compact('couponRedeem', 'users', 'coupons', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon Redeem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $couponRedeem = $this->CouponRedeems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $couponRedeem = $this->CouponRedeems->patchEntity($couponRedeem, $this->request->getData());
            if ($this->CouponRedeems->save($couponRedeem)) {
                $this->Flash->success(__('The coupon redeem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coupon redeem could not be saved. Please, try again.'));
        }
        $users = $this->CouponRedeems->Users->find('list', ['limit' => 200]);
        $coupons = $this->CouponRedeems->Coupons->find('list', ['limit' => 200]);
        $orders = $this->CouponRedeems->Orders->find('list', ['limit' => 200]);
        $this->set(compact('couponRedeem', 'users', 'coupons', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon Redeem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $couponRedeem = $this->CouponRedeems->get($id);
        if ($this->CouponRedeems->delete($couponRedeem)) {
            $this->Flash->success(__('The coupon redeem has been deleted.'));
        } else {
            $this->Flash->error(__('The coupon redeem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
