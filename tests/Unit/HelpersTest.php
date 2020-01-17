<?php

namespace Tests\Unit;

use App\Helpers\Page;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelpersTest extends TestCase
{
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function pate_title_should_return_the_correct_title()
    {
    	$this->assertEquals( 'documentation | Url Loops - Url Site', Page::page_title('documentation'));

        $this->assertTrue(true);
    }
}
