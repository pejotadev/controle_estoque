<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubtypesTable Test Case
 */
class SubtypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubtypesTable
     */
    public $Subtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subtypes',
        'app.Types',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subtypes') ? [] : ['className' => SubtypesTable::class];
        $this->Subtypes = TableRegistry::getTableLocator()->get('Subtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subtypes);

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
