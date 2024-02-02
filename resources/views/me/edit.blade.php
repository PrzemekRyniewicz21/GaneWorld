@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if( $user-> avatar )
                    <div><img src="{{Storage::url($user->avatar)}}"></div>
                @else
                    <img src="/images/avatar.png" class="rounded mx-auto d-block user-avatar">
                @endif

                <div class="form-group">
                    <p>asd</p>
                    <div class="form-group">
                        <label for="avatar">Wybierz avatar</label>
                        <input
                        type="file"
                        class="form-control-file"
                        id="avatar"
                        name="avatar"
                        placeholder="{{$user->avatar}}"
                    >

                        @error('avatar')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>

                    <label for="name">Nazwa</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                    />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Adres email</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                    >
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input
                        type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        id="phone"
                        name="phone"
                    >
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('me.profile') }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
