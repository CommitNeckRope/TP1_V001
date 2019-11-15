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

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
        /*        'fields' => [
                    'id', 'name', 'description'
                ],
        */        'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];


}
