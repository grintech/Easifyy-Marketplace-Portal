<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * YoutubeVideos Controller
 *
 * @property \App\Model\Table\YoutubeVideosTable $YoutubeVideos
 *
 * @method \App\Model\Entity\YoutubeVideo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class YoutubeVideosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $youtubeVideos = $this->paginate($this->YoutubeVideos);

        $this->set(compact('youtubeVideos'));
    }

    /**
     * View method
     *
     * @param string|null $id Youtube Video id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $youtubeVideo = $this->YoutubeVideos->get($id, [
            'contain' => [],
        ]);

        $this->set('youtubeVideo', $youtubeVideo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $youtubeVideo = $this->YoutubeVideos->newEntity();
        if ($this->request->is('post')) {
            $youtubeVideo = $this->YoutubeVideos->patchEntity($youtubeVideo, $this->request->getData());
            if ($this->YoutubeVideos->save($youtubeVideo)) {
                $this->Flash->success(__('The youtube video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The youtube video could not be saved. Please, try again.'));
        }
        $this->set(compact('youtubeVideo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Youtube Video id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $youtubeVideo = $this->YoutubeVideos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $youtubeVideo = $this->YoutubeVideos->patchEntity($youtubeVideo, $this->request->getData());
            if ($this->YoutubeVideos->save($youtubeVideo)) {
                $this->Flash->success(__('The youtube video has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The youtube video could not be saved. Please, try again.'));
        }
        $this->set(compact('youtubeVideo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Youtube Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $youtubeVideo = $this->YoutubeVideos->get($id);
        if ($this->YoutubeVideos->delete($youtubeVideo)) {
            $this->Flash->success(__('The youtube video has been deleted.'));
        } else {
            $this->Flash->error(__('The youtube video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
