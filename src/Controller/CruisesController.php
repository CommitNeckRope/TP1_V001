<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cruises Controller
 *
 * @property \App\Model\Table\CruisesTable $Cruises
 *
 * @method \App\Model\Entity\Cruise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CruisesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ships']
        ];
        $cruises = $this->paginate($this->Cruises);

        $this->set(compact('cruises'));
    }

    /**
     * View method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cruise = $this->Cruises->get($id, [
            'contain' => ['Ships', 'CruisesRoomsUsers', 'Rooms']
        ]);

        $this->set('cruise', $cruise);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cruise = $this->Cruises->newEntity();
        if ($this->request->is('post')) {
            $cruise = $this->Cruises->patchEntity($cruise, $this->request->getData());
            if ($this->Cruises->save($cruise)) {
                $this->Flash->success(__('The cruise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruise could not be saved. Please, try again.'));
        }
        $ships = $this->Cruises->Ships->find('list', ['limit' => 200]);
        $this->set(compact('cruise', 'ships'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $cruise = $this->Cruises->get($id, [
            'contain' => []
        ]);

        $loguser = $this->request->session()->read('Auth.User');
        if($loguser){
            $login = $loguser['email'];
            $email = $cruise['email'];
        }



            if ($this->request->is(['patch', 'post', 'put'])) {
            $cruise = $this->Cruises->patchEntity($cruise, $this->request->getData());
                if($login == $email)   {
                    if ($this->Cruises->save($cruise)) {
                        $this->Flash->success(__('The cruise has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                }

            $this->Flash->error(__('The cruise could not be saved. Please, try again.'));
        }
        $ships = $this->Cruises->Ships->find('list', ['limit' => 200]);
        $this->set(compact('cruise', 'ships'));
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

    /**
     * Delete method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cruise = $this->Cruises->get($id);
        if ($this->Cruises->delete($cruise)) {
            $this->Flash->success(__('The cruise has been deleted.'));
        } else {
            $this->Flash->error(__('The cruise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
