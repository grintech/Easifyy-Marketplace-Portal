<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\RazorpayComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\RazorpayComponent Test Case
 */
class RazorpayComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\RazorpayComponent
     */
    public $Razorpay;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Razorpay = new RazorpayComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Razorpay);

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
