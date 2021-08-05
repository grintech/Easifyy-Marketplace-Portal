<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderInvitationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderInvitationsTable Test Case
 */
class OrderInvitationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderInvitationsTable
     */
    public $OrderInvitations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrderInvitations',
        'app.Orders',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrderInvitations') ? [] : ['className' => OrderInvitationsTable::class];
        $this->OrderInvitations = TableRegistry::getTableLocator()->get('OrderInvitations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderInvitations);

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
