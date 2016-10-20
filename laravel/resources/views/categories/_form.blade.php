<!-- Name Field -->

<div class="form-horizontal">
    <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Name' , ['class'=>'col-md-4 control-label']) }}

        <div class="col-md-6">
            {{ Form::text('name', null, ['class'=>'form-control']) }}
            @include('partials.error', ["key" => "name"])
        </div>
    </div>
</div>

<ul class="list-group form-vertical">

    <li ng-repeat="customField in customFieldsCtrl.fields" class="list-group-item clearfix">

        <div class="col-md-5">
            <div class="form-group">
                <input class="form-control" ng-model="customField.name" ng-change="customFieldsCtrl.nameChange( customField )">
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <select class="form-control" ng-model="customField.type" ng-change="customFieldsCtrl.stringify()">
                    <option value="text">Text</option>
                    <option value="date">Date</option>
                    <option value="textarea">Textarea</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-2">
            <a href="#" class="btn btn-danger pull-right" ng-click="customFieldsCtrl.deleteField( customField )">Delete</a>
        </div>

    </li>

    <li class="list-group-item text-center">
        {{ Form::hidden('fields', null, ['class'=>'form-control', 'ng-value'=>'customFieldsCtrl.fieldsJson']) }}
        <a href="#" class="btn btn-primary" ng-click="customFieldsCtrl.addField()">Add Field</a>
    </li>

</ul>


<div class="form-group">
    <div class="col-md-4"></div>
     <div class="col-md-6">
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    </div>
</div>

