<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RunnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RunnersTable Test Case
 */
class RunnersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RunnersTable
     */
    public $Runners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Runners',
        'app.Users',
        'app.Orders',
        'app.RunnerDeliveryRequests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Runners') ? [] : ['className' => RunnersTable::class];
        $this->Runners = TableRegistry::getTableLocator()->get('Runners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Runners);

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
