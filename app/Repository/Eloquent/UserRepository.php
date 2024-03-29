<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\UserRepository as UserRepositoryInterface;
use App\Model\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function UpdateModel(User $user, array $data): void
    {
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone = $data['phone'] ?? $user->phone;
        $user->avatar = $data['avatar'] ?? null;


        $user->save();
    }

    public function all(): Collection
    {
        return $this->userModel->get();
    }

    public function get(int $id): User
    {
        return $this->userModel->find($id);
    }
}
