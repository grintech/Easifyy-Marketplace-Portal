<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\MerchantsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Api\MerchantsController Test Case
 *
 * @uses \App\Controller\Api\MerchantsController
 */
class MerchantsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Merchants',
        'app.Users',
        'app.States',
        'app.Cities',
        'app.BankAccounts',
        'app.CartItems',
        'app.Coupons',
        'app.MerchantPayouts',
        'app.MerchantProducts',
        'app.MerchantTransactions',
        'app.OrderPayments',
        'app.Orders',
        'app.Purchases',
        'app.Reviews',
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
