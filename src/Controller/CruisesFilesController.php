<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CruisesFiles Controller
 *
 * @property \App\Model\Table\CruisesFilesTable $CruisesFiles
 *
 * @method \App\Model\Entity\CruisesFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CruisesFilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cruises', 'Files']
        ];
        $cruisesFiles = $this->paginate($this->CruisesFiles);

        $this->set(compact('cruisesFiles'));
    }

    public function initialize(){
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');

        // Load Files model
        $this->loadModel('Files');

        // Set the layout
        $this->layout = 'frontend';
    }

    /**
     * View method
     *
     * @param string|null $id Cruises File id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cruisesFile = $this->CruisesFiles->get($id, [
            'contain' => ['Cruises', 'Files']
        ]);

        $this->set('cruisesFile', $cruisesFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['name']['name'])) {
                $fileName = $this->request->data['name']['name'];
                $uploadPath = 'Files/';
                $uploadFile = $uploadPath . $fileName;
                if (move_uploaded_file($this->request->data['name']['tmp_name'], 'img/' . $uploadFile)) {
                    $file = $this->Files->patchEntity($file, $this->request->getData());
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to save file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }
        }
        $articles = $this->Files->Articles->find('list', ['limit' => 200]);
        $this->set(compact('file', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruises File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cruisesFile = $this->CruisesFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cruisesFile = $this->CruisesFiles->patchEntity($cruisesFile, $this->request->getData());
            if ($this->CruisesFiles->save($cruisesFile)) {
                $this->Flash->success(__('The cruises file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruises file could not be saved. Please, try again.'));
        }
        $cruises = $this->CruisesFiles->Cruises->find('list', ['limit' => 200]);
        $files = $this->CruisesFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('cruisesFile', 'cruises', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cruises File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cruisesFile = $this->CruisesFiles->get($id);
        if ($this->CruisesFiles->delete($cruisesFile)) {
            $this->Flash->success(__('The cruises file has been deleted.'));
        } else {
            $this->Flash->error(__('The cruises file could not be deleted. Please, try again.'));
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
