<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CruisesRoomsUsers Controller
 *
 * @property \App\Model\Table\CruisesRoomsUsersTable $CruisesRoomsUsers
 *
 * @method \App\Model\Entity\CruisesRoomsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CruisesRoomsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cruises', 'Users', 'Rooms']
        ];
        $cruisesRoomsUsers = $this->paginate($this->CruisesRoomsUsers);

        $this->set(compact('cruisesRoomsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Cruises Rooms User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cruisesRoomsUser = $this->CruisesRoomsUsers->get($id, [
            'contain' => ['Cruises', 'Users', 'Rooms']
        ]);

        $this->set('cruisesRoomsUser', $cruisesRoomsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cruisesRoomsUser = $this->CruisesRoomsUsers->newEntity();
        if ($this->request->is('post')) {
            $cruisesRoomsUser = $this->CruisesRoomsUsers->patchEntity($cruisesRoomsUser, $this->request->getData());
            if ($this->CruisesRoomsUsers->save($cruisesRoomsUser)) {
                $this->Flash->success(__('The cruises rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruises rooms user could not be saved. Please, try again.'));
        }
        $cruises = $this->CruisesRoomsUsers->Cruises->find('list', ['limit' => 200]);
        $users = $this->CruisesRoomsUsers->Users->find('list', ['limit' => 200]);
        $rooms = $this->CruisesRoomsUsers->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('cruisesRoomsUser', 'cruises', 'users', 'rooms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruises Rooms User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cruisesRoomsUser = $this->CruisesRoomsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cruisesRoomsUser = $this->CruisesRoomsUsers->patchEntity($cruisesRoomsUser, $this->request->getData());
            if ($this->CruisesRoomsUsers->save($cruisesRoomsUser)) {
                $this->Flash->success(__('The cruises rooms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruises rooms user could not be saved. Please, try again.'));
        }
        $cruises = $this->CruisesRoomsUsers->Cruises->find('list', ['limit' => 200]);
        $users = $this->CruisesRoomsUsers->Users->find('list', ['limit' => 200]);
        $rooms = $this->CruisesRoomsUsers->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('cruisesRoomsUser', 'cruises', 'users', 'rooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cruises Rooms User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cruisesRoomsUser = $this->CruisesRoomsUsers->get($id);
        if ($this->CruisesRoomsUsers->delete($cruisesRoomsUser)) {
            $this->Flash->success(__('The cruises rooms user has been deleted.'));
        } else {
            $this->Flash->error(__('The cruises rooms user could not be deleted. Please, try again.'));
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
