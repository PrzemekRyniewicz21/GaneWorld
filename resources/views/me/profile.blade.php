@extends('layout.main')

@section('content')
    <div class="cord mt-3">
        <h5 class="card-header">{{$user->name}}</h5>
        <div class="card-body">
            {{-- {{dd(Storage::url($user->avatar))}} --}}
            @if($user->avatar)

                <img src="{{Storage::url($user->avatar)}}" class="rounded mx-auto d-block user-avatar">
            @else
                <img src="/images/avatar.jpg">
            @endif

            <img src="/images/avatar.png" class="rounded mx-auto d-block">
            <ul>
                <li>Nazwa {{ $user->name }}</li>
                <li>Email {{ $user->email }}</li>
                <li>Telefon {{ $user->phone }}</li>

            </ul>

            <a href="{{ route('me.edit') }}" class="btn btn-light">Edytuj dane</a>
        </div>
    </div>
@endsection
