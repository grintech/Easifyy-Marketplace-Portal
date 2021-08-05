<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantProductsTable Test Case
 */
class MerchantProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantProductsTable
     */
    public $MerchantProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MerchantProducts',
        'app.Merchants',
        'app.Products',
        'app.ProductTypes',
        'app.ProductUnits',
        'app.CartItems',
        'app.MerchantProductBrands',
        'app.MerchantProductBundledItems',
        'app.MerchantProductCategories',
        'app.MerchantProductGalleries',
        'app.OrderItems',
        'app.PurchaseItems',
        'app.Wishlists',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MerchantProducts') ? [] : ['className' => MerchantProductsTable::class];
        $this->MerchantProducts = TableRegistry::getTableLocator()->get('MerchantProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MerchantProducts);

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
