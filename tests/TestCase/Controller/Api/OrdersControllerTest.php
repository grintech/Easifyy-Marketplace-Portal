<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\OrdersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Api\OrdersController Test Case
 *
 * @uses \App\Controller\Api\OrdersController
 */
class OrdersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Orders',
        'app.Merchants',
        'app.Users',
        'app.Addresses',
        'app.Coupons',
        'app.Runners',
        'app.OrderModes',
        'app.OrderStatuses',
        'app.MerchantPayouts',
        'app.OrderItems',
        'app.OrderNotifications',
        'app.OrderPayments',
        'app.RunnerDeliveryRequests',
        'app.Supports',
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
