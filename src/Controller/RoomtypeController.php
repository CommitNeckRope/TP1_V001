<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roomtype Controller
 *
 * @property \App\Model\Table\RoomtypeTable $Roomtype
 *
 * @method \App\Model\Entity\Roomtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomtypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */


    public function index()
    {
        $roomtypes = $this->paginate($this->Roomtype);

        $this->set(compact('roomtypes'));
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['autocomplete', 'findType', 'add', 'edit', 'delete']);
    }

    public function findType() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Roomtype->find('all', array(
                'conditions' => array('Roomtype.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocomplete() {

    }

    /**
     * View method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roomtype = $this->Roomtype->get($id, [
            'contain' => []
        ]);

        $this->set('roomtype', $roomtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roomtype = $this->Roomtype->newEntity();
        if ($this->request->is('post')) {
            $roomtype = $this->Roomtype->patchEntity($roomtype, $this->request->getData());
            if ($this->Roomtype->save($roomtype)) {
                $this->Flash->success(__('The roomtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomtype could not be saved. Please, try again.'));
        }
        $this->set(compact('roomtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roomtype = $this->Roomtype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roomtype = $this->Roomtype->patchEntity($roomtype, $this->request->getData());
            if ($this->Roomtype->save($roomtype)) {
                $this->Flash->success(__('The roomtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roomtype could not be saved. Please, try again.'));
        }
        $this->set(compact('roomtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Roomtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roomtype = $this->Roomtype->get($id);
        if ($this->Roomtype->delete($roomtype)) {
            $this->Flash->success(__('The roomtype has been deleted.'));
        } else {
            $this->Flash->error(__('The roomtype could not be deleted. Please, try again.'));
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
