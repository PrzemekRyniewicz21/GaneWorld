@extends('layout.main');

@section('content')
    <div class="card">
        <div class="card-header"><li class="fas fa-table mr-1"></li>Moje gry</div>
        <div class="card-body">
            <div class="table-responcive">
                <table class="table table-bordered" id="dataTable" with="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Tytul</th>
                            <th>kategoria</th>
                            <th>Ocena</th>
                            <th>Twoja ocena</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games ?? [] as $game )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $game->name }}</td>
                            <td>{{ $game->genres->implode('name', ', ') }}</td>
                            <td>
                                {{ $game->score ?? 'brak' }}
                            </td>
                            <td>
                                <form action="{{ route('me.games.rate') }}" method="post" class="m-0">
                                @csrf
                                    <div class="form-row">
                                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                                        <div class="col-auto">
                                            <input
                                                type="number"
                                                name="rate"
                                                class="form-control mb-2"
                                                max="100"
                                                min="1"
                                                value="{{ $game->pivot->rate }}"
                                                placeholder="ocena"
                                            />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-2">Ocen</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>
                                Ocena
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $games->links() }}
        </div>
    </div>
