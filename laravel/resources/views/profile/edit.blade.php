@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hello') . ' '. auth()->user()->name,
'description' => __('This is your profile page.You can see your data.'),
'class' => 'col-lg-7'
])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('clan') }}/img/icon-user-800x800.png" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    {{-- <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                    <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                </div> --}}
            </div>
            <div class="card-body pt-0 pt-md-4">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                            {{-- <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                        </div>
                        <div>
                            <span class="heading">10</span>
                            <span class="description">{{ __('Photos') }}</span>
                        </div>
                        <div>
                            <span class="heading">89</span>
                            <span class="description">{{ __('Comments') }}</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3>
                    {{ auth()->user()->name }}
                    {{-- <span class="font-weight-light">, 27</span> --}}
                </h3>
                {{-- <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
            </div>
            <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
            </div>
            <div>
                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
            </div>
            <hr class="my-4" />
            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
            <a href="#">{{ __('Show more') }}</a> --}}
        </div>
    </div>
</div>
</div>
<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                @csrf
                @method('put')

                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('nick_name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-nick_name">{{ __('Nick Name') }}</label>
                        <input type="text" name="nick_name" id="input-nick_name" class="form-control form-control-alternative{{ $errors->has('nick_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nick Name') }}" value="{{ old('nick_name', auth()->user()->nick_name) }}" required autofocus>

                        @if ($errors->has('nick_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nick_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
            <hr class="my-4" />
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                @csrf
                @method('put')

                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                @if (session('password_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('password_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="pl-lg-4">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                        @if ($errors->has('old_password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                    </div>
                </div>
            </form>
            <div class="text-center">
                
            </div>

        </div>
    </div>
</div>
</div>
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-1">
                        <h3 class="mb-0">{{ __('Games ') }}</h3>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{ route('server_users.game') }}" class="btn btn-sm btn-primary mr-0">{{ __('Add New Game') }}</a>
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
                                    <form action="{{ route('server_users.destroy', $s_u) }}" method="post">
                                        @csrf
                                        @method('delete')
                                                                                               
                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this game?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @include('layouts.footers.auth')
        </div>
        @endsection