<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContMessageSituationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContMessageSituationsTable Test Case
 */
class ContMessageSituationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContMessageSituationsTable
     */
    public $ContMessageSituations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContMessageSituations',
        'app.Colors',
        'app.ContactMessages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContMessageSituations') ? [] : ['className' => ContMessageSituationsTable::class];
        $this->ContMessageSituations = TableRegistry::getTableLocator()->get('ContMessageSituations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContMessageSituations);

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
