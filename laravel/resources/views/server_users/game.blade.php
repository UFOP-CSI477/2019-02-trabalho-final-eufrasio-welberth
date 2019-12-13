@extends('layouts.app', ['title' => __('Game Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Game')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Game ') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">{{ __('Back to Profile') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('server_users.server') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Game Name') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('game_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-game_id">{{ __('Game Name') }}</label>
                                    <select name="game_id" id="input-game_id" class="form-control form-control-alternative{{ $errors->has('game_id') ? ' is-invalid' : '' }}" placeholder="{{ __('game_id') }}" value="{{ old('game_id') }}" required autofocus>
                                        @foreach ($games as $g)
                                        <option value="" selected disabled hidden>Choose a Game</option>
                                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('game_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('game_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Next') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection