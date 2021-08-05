<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductBundledItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductBundledItemsTable Test Case
 */
class ProductBundledItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductBundledItemsTable
     */
    public $ProductBundledItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductBundledItems',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductBundledItems') ? [] : ['className' => ProductBundledItemsTable::class];
        $this->ProductBundledItems = TableRegistry::getTableLocator()->get('ProductBundledItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductBundledItems);

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
