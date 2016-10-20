@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! Form::open(array('url' => '/register', 'class'=>'form-horizontal')) !!}
                        
                        <!-- Firstname Field -->

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            {{ Form::label('firstname', 'Firstname' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('firstname', null, ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "firstname"])
                            </div>
                        </div>


                        <!-- Lastname Field -->

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            {{ Form::label('lastname', 'Lastname' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('lastname', null, ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "lastname"])
                            </div>
                        </div>


                        <!-- Email Field -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', 'E-mail Address' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::email('email', null, ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "email"])
                            </div>
                        </div>


                        <!-- Birthdate Field -->

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            {{ Form::label('birthdate', 'Birthdate' , ['class'=>'col-md-4 control-label']) }}
                            
                            <div class="col-md-6">
                                {{ Form::date('birthdate', '', ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "birthdate"])
                            </div>
                        </div>


                        <!-- Gender Field -->

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            {{ Form::label('gender', 'Gender' , ['class'=>'col-md-4 control-label']) }}
                            
                            <div class="col-md-6">
                                {{ Form::select('gender', ['0' => 'Male', '1' => 'Female'], null, ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "gender"])
                            </div>
                        </div>


                        <!-- Phone Field -->

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {{ Form::label('phone', 'Phone' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('phone', null, ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "phone"])
                            </div>
                        </div>


                        <!-- Password Field -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', 'Password' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::password('password', ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "password"])
                            </div>
                        </div>


                        <!-- Confirm Password Field -->

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {{ Form::label('password_confirmation', 'Confirm Password' , ['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
                                @include('partials.error', ["key" => "password_confirmation"])
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    
                    {!! Form::close() !!}

                    {!! JsValidator::formRequest( App\Http\Requests\RegisterRequest::class ) !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
