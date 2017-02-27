<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectImages Controller
 *
 * @property \App\Model\Table\ProjectImagesTable $ProjectImages
 */
class ProjectImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $projectImages = $this->paginate($this->ProjectImages);

        $this->set(compact('projectImages'));
        $this->set('_serialize', ['projectImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Project Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectImage = $this->ProjectImages->get($id, [
            'contain' => []
        ]);

        $this->set('projectImage', $projectImage);
        $this->set('_serialize', ['projectImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectImage = $this->ProjectImages->newEntity();
        if ($this->request->is('post')) {
            $projectImage = $this->ProjectImages->patchEntity($projectImage, $this->request->getData());
            if ($this->ProjectImages->save($projectImage)) {
                $this->Flash->success(__('The project image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project image could not be saved. Please, try again.'));
        }
        $this->set(compact('projectImage'));
        $this->set('_serialize', ['projectImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Image id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectImage = $this->ProjectImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectImage = $this->ProjectImages->patchEntity($projectImage, $this->request->getData());
            if ($this->ProjectImages->save($projectImage)) {
                $this->Flash->success(__('The project image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project image could not be saved. Please, try again.'));
        }
        $this->set(compact('projectImage'));
        $this->set('_serialize', ['projectImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectImage = $this->ProjectImages->get($id);
        if ($this->ProjectImages->delete($projectImage)) {
            $this->Flash->success(__('The project image has been deleted.'));
        } else {
            $this->Flash->error(__('The project image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
