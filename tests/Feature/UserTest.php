<?php

namespace Tests\Feature;

use App\Model\Game;
use Carbon\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testExample()
    {
        $game = factory(Game::class)->make([
            'name' => 'Test_name'
        ]);

        $zmienna = factory(Game::class)->create();

        $this->asserttrue(true);
    }


}
