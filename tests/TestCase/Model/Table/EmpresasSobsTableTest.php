<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresasSobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresasSobsTable Test Case
 */
class EmpresasSobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresasSobsTable
     */
    public $EmpresasSobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EmpresasSobs',
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
        $config = TableRegistry::getTableLocator()->exists('EmpresasSobs') ? [] : ['className' => EmpresasSobsTable::class];
        $this->EmpresasSobs = TableRegistry::getTableLocator()->get('EmpresasSobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmpresasSobs);

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
