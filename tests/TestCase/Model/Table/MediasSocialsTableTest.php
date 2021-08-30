<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediasSocialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediasSocialsTable Test Case
 */
class MediasSocialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MediasSocialsTable
     */
    public $MediasSocials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MediasSocials',
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
        $config = TableRegistry::getTableLocator()->exists('MediasSocials') ? [] : ['className' => MediasSocialsTable::class];
        $this->MediasSocials = TableRegistry::getTableLocator()->get('MediasSocials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MediasSocials);

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
