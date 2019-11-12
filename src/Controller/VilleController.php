<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ville Controller
 *
 * @property \App\Model\Table\VilleTable $Ville
 *
 * @method \App\Model\Entity\Ville[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VilleController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pays']
        ];
        $ville = $this->paginate($this->Ville);

        $this->set(compact('ville'));
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByPays']);
    }

    public function getByPays() {
        $pays_id = $this->request->query('pays_id');

        $ville = $this->Ville->find('all', [
            'conditions' => ['Ville.pays_id' => $pays_id],
        ]);
        $this->set('ville', $ville);
        $this->set('_serialize', ['ville']);
    }

    /**
     * View method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ville = $this->Ville->get($id, [
            'contain' => ['Pays']
        ]);

        $this->set('ville', $ville);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ville = $this->Ville->newEntity();
        if ($this->request->is('post')) {
            $ville = $this->Ville->patchEntity($ville, $this->request->getData());
            if ($this->Ville->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ville could not be saved. Please, try again.'));
        }
        $pays = $this->Ville->Pays->find('list', ['limit' => 200]);
        $this->set(compact('ville', 'pays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ville = $this->Ville->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ville = $this->Ville->patchEntity($ville, $this->request->getData());
            if ($this->Ville->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ville could not be saved. Please, try again.'));
        }
        $pays = $this->Ville->Pays->find('list', ['limit' => 200]);
        $this->set(compact('ville', 'pays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ville = $this->Ville->get($id);
        if ($this->Ville->delete($ville)) {
            $this->Flash->success(__('The ville has been deleted.'));
        } else {
            $this->Flash->error(__('The ville could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
            return true;
    }

}
