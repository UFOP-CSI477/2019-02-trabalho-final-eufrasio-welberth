@extends('layouts.app', ['title' => __('game Management')])

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <h3 class="mb-0">{{ __('Games') }}</h3>
                            </div>
                            <form class="navbar-search navbar-search-white form-inline mr-3 d-none d-md-flex " action="{{route('games.search')}}" method="post">
                                @csrf
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Search" type="text" name="name">
                                    </div>
                                    <button type="submit" class="hiden" style="display:none"></button>
                                </div>
                            </form>
                            @auth
                                @if (Auth::user()->type==1)
                                    <div class="col-7 text-right">
                                        <a href="{{ route('games.create') }}" class="btn btn-sm btn-primary mr-0">{{ __('Add Game') }}</a>
                                    </div>
                                @endif
                            @endauth

                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Release date') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($games as $game)
                                    <tr>
                                        <td>{{ $game->name }}</td>
                                        <td> {{$game->start}}</td>
                                        <td>{{ $game->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a href="{{ route('games.show',$game) }}" class="dropdown-item">{{ __('Show') }}</a> 
                                                    @auth                                                                                                  
                                                    @if(Auth::user()->type == 1) 
                                                    <a class="dropdown-item" href="{{ route('games.edit', $game) }}">{{ __('Edit') }}</a>                                                  
                                                    <form action="{{ route('games.destroy', $game) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                                                                               
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this game?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                    @endif
                                                    @endauth 
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $games->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
        @auth
            @include('layouts.footers.auth')
        @else
            @include('layouts.footers.guest')
        @endauth

    </div>
@endsection