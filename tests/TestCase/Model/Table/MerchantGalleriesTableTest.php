<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MerchantGalleriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MerchantGalleriesTable Test Case
 */
class MerchantGalleriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MerchantGalleriesTable
     */
    public $MerchantGalleries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MerchantGalleries',
        'app.Merchants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MerchantGalleries') ? [] : ['className' => MerchantGalleriesTable::class];
        $this->MerchantGalleries = TableRegistry::getTableLocator()->get('MerchantGalleries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MerchantGalleries);

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
