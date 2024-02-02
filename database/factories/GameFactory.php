<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1,1000000),
        // 'steam_appid' => $faker->randomNumber(),
        // 'name' => $faker->word(rand(1,4), true),
        // 'type' => 'game',
        // 'description' => $faker->text,
        // 'short_descriprion' => $faker->text,
        // 'about' => $faker->text,
        // 'image' => $faker->imageUrl(),
        // 'website' => $faker->url,
        // 'price_amount' => $faker->numberBetween(1,2000),
        // 'price_curreny' => 'PLN',
        // 'metacritic_score' => '40',
        // 'metacritic_url' => $faker->url,
        // 'release_date' => $faker->date(),
        // 'language' => 'English'

    ];
});
