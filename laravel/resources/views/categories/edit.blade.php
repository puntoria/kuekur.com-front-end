@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update '{{ $category->name }}' Category</div>
                <div class="panel-body" data-module="custom_fields_module" ng-controller="CustomFieldsController as customFieldsCtrl">

                    {!! Form::model($category, array('class'=>'', 'files'=>true)) !!}
                        
                        @include('categories._form')
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

                   
