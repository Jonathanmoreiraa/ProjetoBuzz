<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutorsSobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutorsSobsTable Test Case
 */
class AutorsSobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AutorsSobsTable
     */
    public $AutorsSobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AutorsSobs',
        'app.Situations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AutorsSobs') ? [] : ['className' => AutorsSobsTable::class];
        $this->AutorsSobs = TableRegistry::getTableLocator()->get('AutorsSobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AutorsSobs);

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
