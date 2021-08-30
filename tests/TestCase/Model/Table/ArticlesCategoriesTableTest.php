<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticlesCategoriesTable Test Case
 */
class ArticlesCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesCategoriesTable
     */
    public $ArticlesCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArticlesCategories',
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
        $config = TableRegistry::getTableLocator()->exists('ArticlesCategories') ? [] : ['className' => ArticlesCategoriesTable::class];
        $this->ArticlesCategories = TableRegistry::getTableLocator()->get('ArticlesCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticlesCategories);

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
