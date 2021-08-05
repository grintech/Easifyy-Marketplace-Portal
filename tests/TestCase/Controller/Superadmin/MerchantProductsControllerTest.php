<?php
namespace App\Test\TestCase\Controller\Superadmin;

use App\Controller\Superadmin\MerchantProductsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Superadmin\MerchantProductsController Test Case
 *
 * @uses \App\Controller\Superadmin\MerchantProductsController
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
        'app.MerchantProductBrands',
        'app.MerchantProductBundledItems',
        'app.MerchantProductCategories',
        'app.MerchantProductGalleries',
        'app.PurchaseItems',
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
