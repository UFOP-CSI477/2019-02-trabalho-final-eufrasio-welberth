@extends('layouts.app')

@section('content')
    @include('users.partials.header', ['title' => __('Show Game')])    

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Game Informacion') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('games.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                            <h6 class="heading-small text-muted mb-4">{{ __('Game information') }}</h6>
                            <div class="pl-lg-4">
                                <div >
                                      <h3><span>{{__('Name')}}:</span><h3><h1><span> {{$game->name}}</span></h1>
                                </div>
                                <div>
                                <span>Release Date: {{$game->start}}</span>
                                </div>
                                <div>
                                <span>Create At: {{$game->created_at->format('d/m/Y H:i')}}</span>
                                </div>
                        
                                                               

                            </div>

                    </div>
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <h3 class="mb-0">{{ __('Servers ') }}</h3>
                                </div>
                            </div>
                        </div>    
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                                <tr>
                                    <td>{{ $server->name }}</td>
                              
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a href="{{ route('servers.show',[$server]) }}" class="dropdown-item">{{ __('Show') }}</a> 
                                                @auth                                                                                                  
                                                @if(Auth::user()->type == 1)                                                 
                                                <form action="{{ route('servers.destroy', $server) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                                                                           
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this server?") }}') ? this.parentElement.submit() : ''">
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
                   