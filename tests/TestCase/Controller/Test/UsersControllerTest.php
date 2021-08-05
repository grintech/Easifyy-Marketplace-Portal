<?php
namespace App\Test\TestCase\Controller\Test;

use App\Controller\Test\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Test\UsersController Test Case
 *
 * @uses \App\Controller\Test\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
        'app.Addresses',
        'app.CartItems',
        'app.CouponRedeems',
        'app.Merchants',
        'app.OrderNotifications',
        'app.OrderPayments',
        'app.Orders',
        'app.Reviews',
        'app.RewardPoints',
        'app.Runners',
        'app.Supports',
        'app.UserLogs',
        'app.UserSocialProfiles',
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
