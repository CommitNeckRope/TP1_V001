<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CruisesFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CruisesFilesTable Test Case
 */
class CruisesFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CruisesFilesTable
     */
    public $CruisesFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CruisesFiles',
        'app.Cruises',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CruisesFiles') ? [] : ['className' => CruisesFilesTable::class];
        $this->CruisesFiles = TableRegistry::getTableLocator()->get('CruisesFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CruisesFiles);

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
