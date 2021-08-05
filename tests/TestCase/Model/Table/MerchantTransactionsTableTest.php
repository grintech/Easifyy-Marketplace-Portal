<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantTransactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantTransactionsTable Test Case
 */
class MerchantTransactionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantTransactionsTable
     */
    public $MerchantTransactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MerchantTransactions',
        'app.Merchants',
        'app.BankAccounts',
        'app.TransactionStatuses',
        'app.MerchantPayouts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MerchantTransactions') ? [] : ['className' => MerchantTransactionsTable::class];
        $this->MerchantTransactions = TableRegistry::getTableLocator()->get('MerchantTransactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MerchantTransactions);

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
