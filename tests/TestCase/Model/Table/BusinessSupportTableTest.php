<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessSupportTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessSupportTable Test Case
 */
class BusinessSupportTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessSupportTable
     */
    public $BusinessSupport;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BusinessSupport',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BusinessSupport') ? [] : ['className' => BusinessSupportTable::class];
        $this->BusinessSupport = TableRegistry::getTableLocator()->get('BusinessSupport', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessSupport);

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
