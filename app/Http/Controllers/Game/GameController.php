<?php

namespace App\Http\Controllers\Game;

use App\Facade\Game;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Repository\GameRepository;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }

    public function index(Request $request): View
    {
        $phrase = $request->get('phrase');
        $type = $request->get('type', GameRepository::TYPE_DEFAULT);
        $size = $request->get('size', 15);

        $resoultPaginator = $this->gameRepository->filterBy($phrase,$type,$size);
        $resoultPaginator->appends([
            'phrase' => $phrase,
            'type' => $type
        ]);

        return view('game.list', [
            // 'games' => $this->gameRepository->allPaginated(10)
            'games' => $resoultPaginator,
            'phrase' => $phrase,
            'type' => $type
        ]);
    }

    public function dashboard(): View
    {
        return view('game.dashboard', [
            'bestGames' => $this->gameRepository->best(),
            'stats' => $this->gameRepository->stats(),
            'scoreStats' => $this->gameRepository->scoreStats()
        ]);
    }

    public function show(int $gameId, Request $request): View
    {
        $user = Auth::user();
        $hasGame = $user->hasGame($gameId);

        return view('game.show', [
            'game' => $this->gameRepository->get($gameId),
            'userHasGame' => $hasGame
        ]);
    }
}
