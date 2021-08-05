<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RunnerDeliveryRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RunnerDeliveryRequestsTable Test Case
 */
class RunnerDeliveryRequestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RunnerDeliveryRequestsTable
     */
    public $RunnerDeliveryRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RunnerDeliveryRequests',
        'app.Runners',
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
        $config = TableRegistry::getTableLocator()->exists('RunnerDeliveryRequests') ? [] : ['className' => RunnerDeliveryRequestsTable::class];
        $this->RunnerDeliveryRequests = TableRegistry::getTableLocator()->get('RunnerDeliveryRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RunnerDeliveryRequests);

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
