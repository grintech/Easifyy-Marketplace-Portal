<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantProductGalleriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantProductGalleriesTable Test Case
 */
class MerchantProductGalleriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantProductGalleriesTable
     */
    public $MerchantProductGalleries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MerchantProductGalleries',
        'app.MerchantProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MerchantProductGalleries') ? [] : ['className' => MerchantProductGalleriesTable::class];
        $this->MerchantProductGalleries = TableRegistry::getTableLocator()->get('MerchantProductGalleries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MerchantProductGalleries);

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
