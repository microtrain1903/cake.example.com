<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

class Math{
    function sum($a, $b, $c=0){
        return $a + $b + $c;
    }
}

/**
 * App\Model\Table\PostsTable Test Case
 */
class PostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsTable
     */
    public $Posts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Posts',
        //'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Posts') ? [] : ['className' => PostsTable::class];
        $this->Posts = TableRegistry::getTableLocator()->get('Posts', $config);

        $this->Math = new Math();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Posts);

        parent::tearDown();
    }


    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testSum()
    {
        $result=$this->Math->sum(2,2);
        $this->assertEquals(4, $result);

        $result=$this->Math->sum(2,3);
        $this->assertEquals(5, $result);

        $result=$this->Math->sum(15,3);
        $this->assertEquals(18, $result);


        $result=$this->Math->sum(15,3,5);
        $this->assertEquals(23, $result);
    }
}
