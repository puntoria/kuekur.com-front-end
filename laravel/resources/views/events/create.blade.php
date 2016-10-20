@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Event</div>
                <div class="panel-body">

                    {!! Form::open(array('class'=>'form-horizontal', 'files'=>true)) !!}
                        
                        @include('events._form')
                    
                    {!! Form::close() !!}

                    {!! JsValidator::formRequest( App\Http\Requests\EventRequest::class ) !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

                   
