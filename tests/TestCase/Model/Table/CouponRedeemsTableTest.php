<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CouponRedeemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CouponRedeemsTable Test Case
 */
class CouponRedeemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CouponRedeemsTable
     */
    public $CouponRedeems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CouponRedeems',
        'app.Users',
        'app.Coupons',
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
        $config = TableRegistry::getTableLocator()->exists('CouponRedeems') ? [] : ['className' => CouponRedeemsTable::class];
        $this->CouponRedeems = TableRegistry::getTableLocator()->get('CouponRedeems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CouponRedeems);

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
