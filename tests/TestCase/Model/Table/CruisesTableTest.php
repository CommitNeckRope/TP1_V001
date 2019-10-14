<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CruisesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CruisesTable Test Case
 */
class CruisesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CruisesTable
     */
    public $Cruises;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cruises',
        'app.Ships',
        'app.CruisesRoomsUsers',
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
        $config = TableRegistry::getTableLocator()->exists('Cruises') ? [] : ['className' => CruisesTable::class];
        $this->Cruises = TableRegistry::getTableLocator()->get('Cruises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cruises);

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
