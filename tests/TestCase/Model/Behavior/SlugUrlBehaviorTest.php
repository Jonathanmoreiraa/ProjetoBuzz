<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\SlugUrlBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\SlugUrlBehavior Test Case
 */
class SlugUrlBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\SlugUrlBehavior
     */
    public $SlugUrl;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->SlugUrl = new SlugUrlBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SlugUrl);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
