@extends('layouts.app')

@section('content')
@include('users.partials.header', ['title' => __('Show Server')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Server Informacion') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('games.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <h6 class="heading-small text-muted mb-4">{{ __('Server information') }}</h6>
                    <div class="pl-lg-4">
                        @auth
                        @if(Auth::user()->type==1)
                        <form method="post" action="{{ route('servers.update',$server) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $server->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                               @endif
                               <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>  
                        @endif
                        @else
                        <div>
                            <h3><span>{{__('Name')}}:</span>
                                <h3>
                                    <h1><span> {{$server->name}}</span></h1>
                        </div>
                        @endauth
                        <div>
                            <span>Create At: {{$server->created_at->format('d/m/Y H:i')}}</span>
                        </div>



                    </div>

                </div>
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <h3 class="mb-0">{{ __('Users ') }}</h3>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Nick') }}</th>
                                <th scope="col">{{ __('Character') }}</th>
                                <th scope="col">{{ __('Started') }}</th>
                                <th scope="col">{{ __('Play at') }}</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($server_users as $s_u)
                            <tr>
                                <td>{{ $s_u->user->name }}</td>
                                <td>{{ $s_u->user->nick_name }}</td>
                                <td>{{ $s_u->character }}</td>
                                <td>{{ $s_u->started }}</td>
                                <td>@if($s_u->period == 1)
                                        {{ __('Morning') }} 
                                    @elseif($s_u->period == 2)
                                        {{ __('Evening') }} 
                                    @elseif($s_u->period == 3)
                                        {{ __('Night') }} 
                                    @else
                                        {{ __('All Day') }}  
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a href="{{ route('users.show',[$s_u->user]) }}" class="dropdown-item">{{ __('Show') }}</a>

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