<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactMessagesTable Test Case
 */
class ContactMessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactMessagesTable
     */
    public $ContactMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContactMessages',
        'app.Users',
        'app.ContMessageSituations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContactMessages') ? [] : ['className' => ContactMessagesTable::class];
        $this->ContactMessages = TableRegistry::getTableLocator()->get('ContactMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContactMessages);

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
