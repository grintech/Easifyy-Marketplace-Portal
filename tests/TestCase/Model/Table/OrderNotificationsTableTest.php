<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderNotificationsTable Test Case
 */
class OrderNotificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderNotificationsTable
     */
    public $OrderNotifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrderNotifications',
        'app.Users',
        'app.Merchants',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrderNotifications') ? [] : ['className' => OrderNotificationsTable::class];
        $this->OrderNotifications = TableRegistry::getTableLocator()->get('OrderNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderNotifications);

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
