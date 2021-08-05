<?php
namespace App\Test\TestCase\Controller\Test;

use App\Controller\Test\MerchantProductsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Test\MerchantProductsController Test Case
 *
 * @uses \App\Controller\Test\MerchantProductsController
 */
class MerchantProductsControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
