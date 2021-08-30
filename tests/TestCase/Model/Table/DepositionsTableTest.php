<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepositionsTable Test Case
 */
class DepositionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepositionsTable
     */
    public $Depositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Depositions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Depositions') ? [] : ['className' => DepositionsTable::class];
        $this->Depositions = TableRegistry::getTableLocator()->get('Depositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Depositions);

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
