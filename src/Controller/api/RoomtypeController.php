<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use \Crud\Controller\ControllerTrait;

class RoomtypeController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name', 'description'
        ],
*/        'sortWhitelist' => [
            'id', 'name'
        ]
    ];

}
