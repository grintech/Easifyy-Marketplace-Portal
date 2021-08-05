<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSocialProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSocialProfilesTable Test Case
 */
class UserSocialProfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSocialProfilesTable
     */
    public $UserSocialProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserSocialProfiles',
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
        $config = TableRegistry::getTableLocator()->exists('UserSocialProfiles') ? [] : ['className' => UserSocialProfilesTable::class];
        $this->UserSocialProfiles = TableRegistry::getTableLocator()->get('UserSocialProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSocialProfiles);

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
