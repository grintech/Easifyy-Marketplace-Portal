<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantProductBrandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantProductBrandsTable Test Case
 */
class MerchantProductBrandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantProductBrandsTable
     */
    public $MerchantProductBrands;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MerchantProductBrands',
        'app.MerchantProducts',
        'app.Brands',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MerchantProductBrands') ? [] : ['className' => MerchantProductBrandsTable::class];
        $this->MerchantProductBrands = TableRegistry::getTableLocator()->get('MerchantProductBrands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MerchantProductBrands);

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
