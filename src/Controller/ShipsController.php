<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ships Controller
 *
 * @property \App\Model\Table\ShipsTable $Ships
 *
 * @method \App\Model\Entity\Ship[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ships = $this->paginate($this->Ships);

        $this->set(compact('ships'));
    }

    /**
     * View method
     *
     * @param string|null $id Ship id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ship = $this->Ships->get($id, [
            'contain' => ['Cruises']
        ]);

        $this->set('ship', $ship);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ship = $this->Ships->newEntity();
        if ($this->request->is('post')) {
            $ship = $this->Ships->patchEntity($ship, $this->request->getData());
            if ($this->Ships->save($ship)) {
                $this->Flash->success(__('The ship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ship could not be saved. Please, try again.'));
        }
        $this->set(compact('ship'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ship id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ship = $this->Ships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ship = $this->Ships->patchEntity($ship, $this->request->getData());
            if ($this->Ships->save($ship)) {
                $this->Flash->success(__('The ship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ship could not be saved. Please, try again.'));
        }
        $this->set(compact('ship'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ship id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ship = $this->Ships->get($id);
        if ($this->Ships->delete($ship)) {
            $this->Flash->success(__('The ship has been deleted.'));
        } else {
            $this->Flash->error(__('The ship could not be deleted. Please, try again.'));
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
