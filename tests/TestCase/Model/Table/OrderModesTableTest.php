<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderModesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderModesTable Test Case
 */
class OrderModesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderModesTable
     */
    public $OrderModes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrderModes',
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
        $config = TableRegistry::getTableLocator()->exists('OrderModes') ? [] : ['className' => OrderModesTable::class];
        $this->OrderModes = TableRegistry::getTableLocator()->get('OrderModes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderModes);

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
}
