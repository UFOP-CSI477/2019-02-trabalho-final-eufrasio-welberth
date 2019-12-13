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
                        <form method="post" action="{{ route('server_users.store',) }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Game Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('server_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-server_id">{{ __('Server Name') }}</label>
                                    <select name="server_id"  id="input-server_id" class="form-control form-control-alternative{{ $errors->has('server_id') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="{{ old('server_id') }}" required autofocus>
                                        @foreach ($servers as $s)
                                        <option value="" selected disabled hidden>Choose a Server</option>
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('server_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('server_id') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group{{ $errors->has('character') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-character">{{ __('Character Name') }}</label>
                                        <input type="text" name="character" id="input-character" class="form-control form-control-alternative{{ $errors->has('character') ? ' is-invalid' : '' }}" placeholder="{{ __('Character Name') }}" value="{{ old('character', auth()->user()->character) }}" required autofocus>
                
                                        @if ($errors->has('character'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('character') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('started') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-started">{{ __('Begining in') }}</label>
                                        <input type="date" name="started" id="input-started" class="form-control form-control-alternative{{ $errors->has('started') ? ' is-invalid' : '' }}" placeholder="{{ __('Begining In') }}" value="{{ old('started', auth()->user()->started) }}" required autofocus>
                
                                        @if ($errors->has('started'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('started') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('period') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-period">{{ __('Begining in') }}</label>
                                        <select name="period"  id="input-period" class="form-control form-control-alternative{{ $errors->has('period') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="{{ old('period') }}" required autofocus>
                                           
                                            <option value="" selected disabled hidden>Choose an Period</option>
                                            <option value="1">{{__('Morning')}}</option>
                                            <option value="2">{{__('Evening')}}</option>
                                            <option value="3">{{__('Night')}}</option>
                                            <option value="0">{{__('All Day')}}</option>
                                        
                                          
                                        </select>
                
                                        @if ($errors->has('period'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('period') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                               

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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