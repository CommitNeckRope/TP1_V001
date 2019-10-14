<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefRoomCategories Controller
 *
 * @property \App\Model\Table\RefRoomCategoriesTable $RefRoomCategories
 *
 * @method \App\Model\Entity\RefRoomCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefRoomCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $refRoomCategories = $this->paginate($this->RefRoomCategories);

        $this->set(compact('refRoomCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Room Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refRoomCategory = $this->RefRoomCategories->get($id, [
            'contain' => ['Rooms']
        ]);

        $this->set('refRoomCategory', $refRoomCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refRoomCategory = $this->RefRoomCategories->newEntity();
        if ($this->request->is('post')) {
            $refRoomCategory = $this->RefRoomCategories->patchEntity($refRoomCategory, $this->request->getData());
            if ($this->RefRoomCategories->save($refRoomCategory)) {
                $this->Flash->success(__('The ref room category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref room category could not be saved. Please, try again.'));
        }
        $this->set(compact('refRoomCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Room Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refRoomCategory = $this->RefRoomCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refRoomCategory = $this->RefRoomCategories->patchEntity($refRoomCategory, $this->request->getData());
            if ($this->RefRoomCategories->save($refRoomCategory)) {
                $this->Flash->success(__('The ref room category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref room category could not be saved. Please, try again.'));
        }
        $this->set(compact('refRoomCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Room Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refRoomCategory = $this->RefRoomCategories->get($id);
        if ($this->RefRoomCategories->delete($refRoomCategory)) {
            $this->Flash->success(__('The ref room category has been deleted.'));
        } else {
            $this->Flash->error(__('The ref room category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
        // authentifiés sur l'application
        if (in_array($action, ['add', 'tags', 'edit', 'delete'])) {
            return true;
        }

    }
}
