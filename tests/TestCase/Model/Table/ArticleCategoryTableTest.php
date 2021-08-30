<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleCategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleCategoryTable Test Case
 */
class ArticleCategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleCategoryTable
     */
    public $ArticleCategory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArticleCategory',
        'app.Situations',
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticleCategory') ? [] : ['className' => ArticleCategoryTable::class];
        $this->ArticleCategory = TableRegistry::getTableLocator()->get('ArticleCategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticleCategory);

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
