<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefRoomCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefRoomCategoriesTable Test Case
 */
class RefRoomCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RefRoomCategoriesTable
     */
    public $RefRoomCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RefRoomCategories',
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
        $config = TableRegistry::getTableLocator()->exists('RefRoomCategories') ? [] : ['className' => RefRoomCategoriesTable::class];
        $this->RefRoomCategories = TableRegistry::getTableLocator()->get('RefRoomCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefRoomCategories);

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
