<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionStatusesTable Test Case
 */
class TransactionStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionStatusesTable
     */
    public $TransactionStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TransactionStatuses',
        'app.MerchantTransactions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TransactionStatuses') ? [] : ['className' => TransactionStatusesTable::class];
        $this->TransactionStatuses = TableRegistry::getTableLocator()->get('TransactionStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransactionStatuses);

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
