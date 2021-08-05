<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YoutubeVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YoutubeVideosTable Test Case
 */
class YoutubeVideosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\YoutubeVideosTable
     */
    public $YoutubeVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.YoutubeVideos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('YoutubeVideos') ? [] : ['className' => YoutubeVideosTable::class];
        $this->YoutubeVideos = TableRegistry::getTableLocator()->get('YoutubeVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->YoutubeVideos);

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
