@extends('layouts.app')

@section('content')
@include('users.partials.header', ['title' => __('Show User')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('User Informacion') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                    <div class="pl-lg-4">
                        
                        <div>
                            <h3><span>{{__('Name')}}:</span> <h3>
                            <h1><span> {{$user->name}}</span></h1>
                        </div>
                        <div>
                            <h4><span>{{__('Nick')}}:</span> <h3>
                            <h2><span> {{$user->nick_name}}</span></h2>
                        </div>
                        <div>
                            <span>Create At: {{$user->created_at->format('d/m/Y H:i')}}</span>
                        </div>



                    </div>

                </div>
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-1">
                                <h3 class="mb-0">{{ __('Games ') }}</h3>
                            </div>
                        </div>
                    </div>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Server') }}</th>
                                <th scope="col">{{ __('Character') }}</th>
                                <th scope="col">{{ __('Started') }}</th>
                                <th scope="col">{{ __('Play at') }}</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($server_users as $s_u)
                            <tr>
                                <td>{{ $s_u->name }}</td>
                                <td>{{ $s_u->server->name }}</td>
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
                                            <a href="{{ route('servers.show',[$s_u->server]) }}" class="dropdown-item">{{ __('Show') }}</a>

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