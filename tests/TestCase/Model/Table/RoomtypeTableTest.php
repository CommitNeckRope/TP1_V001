<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoomtypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoomtypeTable Test Case
 */
class RoomtypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RoomtypeTable
     */
    public $Roomtype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Roomtype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Roomtype') ? [] : ['className' => RoomtypeTable::class];
        $this->Roomtype = TableRegistry::getTableLocator()->get('Roomtype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roomtype);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
