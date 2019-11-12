<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VilleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VilleTable Test Case
 */
class VilleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VilleTable
     */
    public $Ville;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ville',
        'app.Pays'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ville') ? [] : ['className' => VilleTable::class];
        $this->Ville = TableRegistry::getTableLocator()->get('Ville', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ville);

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
