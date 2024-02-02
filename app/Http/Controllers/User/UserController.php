<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repository\UserRepository as UserRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private UserRepositoryInterface $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    public function profile()
    {
        return view('me.profile',[
            'user' =>  Auth::user()
        ]);
    }

    public function edit(Request $request){
        return view('me.edit',[
            'user' => Auth::user()
        ]);
    }


    public function update(UpdateUserProfile $request){
        //pobieranie danych zalogowanego user'a
        $user = Auth::user();
        $data = $request->validated();
        $path = null;

        if(!empty($request['avatar'])) {
            $path = $data['avatar']->storeAs('avatars',$user->id,'public');
        }


        if($path){
            Storage::disk('public')->delete($user->avatar);
            $data['avatar'] = $path;
        }

        $this->user->UpdateModel(Auth::user(),$data);

        return redirect()
            ->route('me.profile')
            ->with('status', 'Profil zaktualizowany');
    }


    public function updateValidationRules(Request $request){ // obecnie is not in use
        // dd($request->all());

        $request->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required|max:200'
        ]);

        return redirect()
            ->route('me.profile')
            ->with('status', 'Profil zaktualizowano');

    }
}
