<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ProductUnits Controller
 *
 * @property \App\Model\Table\ProductUnitsTable $ProductUnits
 *
 * @method \App\Model\Entity\ProductUnit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductUnitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $productUnits = $this->paginate($this->ProductUnits);

        $this->set(compact('productUnits'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Unit id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productUnit = $this->ProductUnits->get($id, [
            'contain' => [],
        ]);

        $this->set('productUnit', $productUnit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productUnit = $this->ProductUnits->newEntity();
        if ($this->request->is('post')) {
            $productUnit = $this->ProductUnits->patchEntity($productUnit, $this->request->getData());
            if ($this->ProductUnits->save($productUnit)) {
                $this->Flash->success(__('The product unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product unit could not be saved. Please, try again.'));
        }
        $this->set(compact('productUnit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productUnit = $this->ProductUnits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productUnit = $this->ProductUnits->patchEntity($productUnit, $this->request->getData());
            if ($this->ProductUnits->save($productUnit)) {
                $this->Flash->success(__('The product unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product unit could not be saved. Please, try again.'));
        }
        $this->set(compact('productUnit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productUnit = $this->ProductUnits->get($id);
        if ($this->ProductUnits->delete($productUnit)) {
            $this->Flash->success(__('The product unit has been deleted.'));
        } else {
            $this->Flash->error(__('The product unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
