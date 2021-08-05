<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryAddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryAddressesTable Test Case
 */
class DeliveryAddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryAddressesTable
     */
    public $DeliveryAddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DeliveryAddresses',
        'app.Users',
        'app.Cities',
        'app.States',
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
        $config = TableRegistry::getTableLocator()->exists('DeliveryAddresses') ? [] : ['className' => DeliveryAddressesTable::class];
        $this->DeliveryAddresses = TableRegistry::getTableLocator()->get('DeliveryAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeliveryAddresses);

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
