<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\SluggifyBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\SluggifyBehavior Test Case
 */
class SluggifyBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\SluggifyBehavior
     */
    public $Sluggify;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Sluggify = new SluggifyBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sluggify);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
