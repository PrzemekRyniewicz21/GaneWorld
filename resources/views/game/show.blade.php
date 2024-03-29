@extends('layout.main')

@section('content')
<div class="card mt-3">
    @if(!empty($game))

        <h5 class="card-header">

            {{$game->name}}
            @if ($userHasGame)

                <form class="float-right m-0" method="post" action="{{route('me.games.remove')}}">
                    @method('delete');
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{$game->id}}">
                        <button type="submit" class="btn btn-primary mb-2">Usun z listy ulubionych</button>
                    </div>

                </form>
            @else
                <!-- To jest ten caly przycisk "Dodaj do mojej listy"  -->

                <form class="float-right m-0" method="post" action="{{route('me.games.add')}}">

                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{$game->id}}">
                        <button type="submit" class="btn btn-primary mb-2">Dodaj do mojej listy</button>
                    </div>

                </form>
            @endif

        </h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger"></div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <ul>
                <li>Id: {{ $game->id }}</li>
                <li>Nazwa: {{ $game->name }}</li>
                <li>Wydawca: {{ $game->publishers->implode('name', ', ') }}</li>
                <li>Gatunek:{{ $game->genres->implode('name', ', ') }}</li>
            </ul>
            <div class="my-4">
                <h4>Krótki opis</h3>
                <div class="mx-2">{!! $game->short_description !!}</div>
            </div>

            <div class="my-4">
                <h4>Opis</h3>
                <div class="mx-2">{!! $game->description !!}</div>
            </div>

            <div class="my-4">
                <h4>About</h3>
                <div class="mx-2">{!! $game->about !!}</div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-light">Powrot</a>
        </div>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
