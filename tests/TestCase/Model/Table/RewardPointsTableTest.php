<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RewardPointsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RewardPointsTable Test Case
 */
class RewardPointsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RewardPointsTable
     */
    public $RewardPoints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RewardPoints',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RewardPoints') ? [] : ['className' => RewardPointsTable::class];
        $this->RewardPoints = TableRegistry::getTableLocator()->get('RewardPoints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RewardPoints);

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
