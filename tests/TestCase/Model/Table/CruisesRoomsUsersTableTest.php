<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CruisesRoomsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CruisesRoomsUsersTable Test Case
 */
class CruisesRoomsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CruisesRoomsUsersTable
     */
    public $CruisesRoomsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CruisesRoomsUsers',
        'app.Cruises',
        'app.Users',
        'app.Rooms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CruisesRoomsUsers') ? [] : ['className' => CruisesRoomsUsersTable::class];
        $this->CruisesRoomsUsers = TableRegistry::getTableLocator()->get('CruisesRoomsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CruisesRoomsUsers);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
