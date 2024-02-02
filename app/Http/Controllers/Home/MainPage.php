<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Game\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPage extends Controller
{
    //public function __invoke()
    public function __invoke(Request $request)
    {
        $gameId = 44;

        // $url = url("game/$gameId");
        // $url = url()->current();
        // $url = url()->full(); // zwraca z query pararmetrami
        // $url = url()->previous();

        // $routeUrl = route('games.show',['game' => $gameId]);
        // $routeUrl = route('games.show', [
        //     'game' => $gameId,
        //     'foo' => 'bar'
        // ]);

        // $actionUrl = action([GameController::class, 'dashboard']);
        // $actionUrl = action(
        //     [GameController::class, 'show'],
        //     ['game' => $gameId, 'foo' => 'bar']
        // );


        // dump($actionUrl);
        // dd("end");

        $user = Auth::user();

        return view('home.main', ['user' => $user]);
    }
}
