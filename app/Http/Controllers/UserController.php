<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        if (Gate::denies('admin-level')) {
            abort(403);
        }

        $users = $this->userRepository->all();

        return view('user.list', ['users' => $users]);
    }

    public function show(Request $request, int $userId)
    {
            $user = $request->user();

            if($user->can('admin-level')){
                abort('403');
            }

			Gate::authorize('admin-level');

			$userModel = $this->userRepository->get($userId);

			Gate::authorize('view', $userModel);

			return view('user.show', ['user' => $this->userRepository->get($userId)]);
    }

}
