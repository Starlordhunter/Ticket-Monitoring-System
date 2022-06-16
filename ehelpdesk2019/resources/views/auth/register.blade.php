@extends('layouts.app')

@section('page', __('Register'))

@section('auth_content')
<div  id="try">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ic" class="col-md-4 col-form-label text-md-right">{{ __('Ic No') }}</label>

                            <div class="col-md-6">
                                <input id="ic" type="number" class="form-control{{ $errors->has('ic') ? ' is-invalid' : '' }}" name="ic" value="{{ old('ic') }}" required>

                                @if ($errors->has('ic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="extensionNo" class="col-md-4 col-form-label text-md-right">{{ __('Extension No') }}</label>
                            <div class="col-md-6">
                                <input id="extensionNo" type="number" class="form-control{{ $errors->has('extensionNo') ? ' is-invalid' : '' }}" name="extensionNo" value="{{ old('extensionNo') }}" required>

                                @if ($errors->has('extensionNo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('extensionNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="office" class="col-md-4 col-form-label text-md-right">{{ __('Office') }}</label>
                            <div class="col-md-6">
                                <input id="office" type="number" class="form-control{{ $errors->has('office') ? ' is-invalid' : '' }}" name="office" value="{{ old('office') }}" required>

                                @if ($errors->has('office'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('office') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                            <div class="col-md-6">                            
                                <select name="state"  class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" required autofocus>
                                    <option value="{{ old('state') }}">Please Select</option>
                                  
                                    @foreach(\Kordy\Ticketit\Models\State::all() as $states)
                                    <option value="{{ $states->id }}"> {{ $states->name }}</option>   
                                    @endforeach
                                </select>  
                                                           
                            </div>
                        </div>

                         <div class="form-group row">
                        <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label>
                            <div class="col-md-6">                            
                            <select name="project" id="project"  class="form-control{{ $errors->has('project') ? ' is-invalid' : '' }}" required autofocus>
                             </select>                               
                            </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="departmentArea" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            <div class="col-md-6">                            
                            <select name="departmentArea" id="departmentArea"  class="form-control{{ $errors->has('departmentArea') ? ' is-invalid' : '' }} departmentArea" required autofocus>
                         
                             </select>                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('position') }}</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" value="{{ old('position') }}"  autofocus>

                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id="address" class="form-group row">
                            <label for="address1" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}"  readonly="readonly" name="address1" value="{{ old('address1') }}" required autofocus>
                             </div>
                        </div>
                        <div id="address" class="form-group row">
                            <label for="address2" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}"  readonly="readonly" name="address2" value="{{ old('address2') }}" required autofocus>
                             </div>
                        </div>
                        <div id="address" class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"  readonly="readonly" name="postcode" value="{{ old('postcode') }}" required autofocus>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="reset" class="btn btn-primary1">
                                    {{ __('Reset') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

