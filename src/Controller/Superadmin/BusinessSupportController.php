<?php
namespace App\Controller\superadmin;

use App\Controller\AppController;

/**
 * BusinessSupport Controller
 *
 * @property \App\Model\Table\BusinessSupportTable $BusinessSupport
 *
 * @method \App\Model\Entity\BusinessSupport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessSupportController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $businessSupport = $this->paginate($this->BusinessSupport);

        $this->set(compact('businessSupport'));
    }

    /**
     * View method
     *
     * @param string|null $id Business Support id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessSupport = $this->BusinessSupport->get($id, [
            'contain' => [],
        ]);

        $this->set('businessSupport', $businessSupport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessSupport = $this->BusinessSupport->newEntity();
        if ($this->request->is('post')) {

            $data=$this->request->getData();
            $data['slug']=$this->slugify($data['name']); 

            $businessSupport = $this->BusinessSupport->patchEntity($businessSupport, $data);
            if ($this->BusinessSupport->save($businessSupport)) {
                $this->Flash->success(__('The business support has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business support could not be saved. Please, try again.'));
        }
        $this->set(compact('businessSupport'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Business Support id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessSupport = $this->BusinessSupport->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessSupport = $this->BusinessSupport->patchEntity($businessSupport, $this->request->getData());
            if ($this->BusinessSupport->save($businessSupport)) {
                $this->Flash->success(__('The business support has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The business support could not be saved. Please, try again.'));
        }
        $this->set(compact('businessSupport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Business Support id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessSupport = $this->BusinessSupport->get($id);
        if ($this->BusinessSupport->delete($businessSupport)) {
            $this->Flash->success(__('The business support has been deleted.'));
        } else {
            $this->Flash->error(__('The business support could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
  
        // trim
        $text = trim($text, '-');
  
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
  
        // lowercase
        $text = strtolower($text);
  
        if (empty($text)) {
          return 'n-a';
        }
  
        return $text;
      }
}
