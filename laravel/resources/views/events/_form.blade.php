<!-- Featured Image Field -->

<div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
    {{ Form::label('featured_image', 'Featured Image' , ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::file('featured_image', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "featured_image"])
    </div>
</div>

<!-- Name Field -->

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', 'Name' , ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('name', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "name"])
    </div>
</div>


<!-- Description Field -->

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', 'Description' , ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::textarea('description', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "description"])
    </div>
</div>


<!-- Category Field -->

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    {{ Form::label('category_id', 'Category' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "category_id"])
    </div>
</div>             


<!-- Country Field -->

<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
    {{ Form::label('country_id', 'Country' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::select('country_id', $countries, null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "country_id"])
    </div>
</div>              


<!-- City Field -->

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
    {{ Form::label('city_id', 'City' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::select('city_id', $cities, null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "city_id"])
    </div>
</div>    

<!-- Is the event recurring Field -->

<div class="form-group{{ $errors->has('recurring') ? ' has-error' : '' }}">
    {{ Form::label('recurring', 'Recurring' , ['class'=>'col-md-4 control-label' ]) }}
    <div class="col-md-6">
        {{  Form::checkbox( 'recurring', 1 , false, ['class'=>'form-control'] ) }}
        @include('partials.error', ["key" => "recurring"])
    </div>
</div> 

<!-- When will the event recurr-->

<div class="form-group{{ $errors->has('recurring_dates') ? ' has-error' : '' }}">
    {{ Form::label('recurring_dates', 'Recurring Dates' , ['class'=>'col-md-4 control-label' ]) }}
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'monday', 1 , false ) }} M
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('monday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('monday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'tuesday', 1 , false) }} T     
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('tuesday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('tuesday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>    
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'wednesday', 1 , false) }} W   
                </div> 
            </div> 
            <div class="col-md-5">
                {{ Form::date('wednesday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('wednesday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'thursday', 1 , false ) }}  T    
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('thursday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('thursday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'friday', 1 , false  ) }} F    
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('friday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('friday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>    
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'saturday', 1 , false  ) }} S    
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('saturday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('saturday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-control-static">
                    {{  Form::checkbox( 'sunday', 1 , false ) }} S 
                </div>
            </div> 
            <div class="col-md-5">
                {{ Form::date('sunday_start', '', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-5">
                {{ Form::date('sunday_end', '', ['class'=>'form-control']) }}
            </div>
        </div>
        
    </div>
</div>


<!-- Start 1 Date Field -->

<div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
    {{ Form::label('start', 'Start Date' , ['class'=>'col-md-4 control-label' ]) }}
    
    <div class="col-md-6">
        {{ Form::text('start', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "start"])
    </div>
</div>


<!-- End Date Field -->

<div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
    {{ Form::label('end', 'End Date' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::text('end', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "end"])
    </div>
</div>                       


 <!-- Capacity Date Field -->

<div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
    {{ Form::label('capacity', 'Capacity' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::number('capacity', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "capacity"])
    </div>
</div>

<!-- Address 1 Date Field -->

<div class="form-group{{ $errors->has('address_1') ? ' has-error' : '' }}">
    {{ Form::label('address_1', 'First Address' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::text('address_1', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "address_1"])
    </div>
</div> 

<!-- Address 2 Date Field -->

<div class="form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
    {{ Form::label('address_2', 'Second Address' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::text('address_2', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "address_2"])
    </div>
</div>  


<!-- Zip Date Field -->

<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
    {{ Form::label('zip', 'Zip' , ['class'=>'col-md-4 control-label']) }}
    
    <div class="col-md-6">
        {{ Form::text('zip', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "zip"])
    </div>
</div>


<!-- Latitude Field -->

<div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
    {{ Form::label('latitude', 'Latitude' , ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('latitude', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "latitude"])
    </div>
</div>

<!-- Longitude Field -->

<div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
    {{ Form::label('longitude', 'Longitude' , ['class'=>'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('longitude', null, ['class'=>'form-control']) }}
        @include('partials.error', ["key" => "longitude"])
    </div>
</div>

<!-- Submit Field -->

<div class="form-group">
    <div class="col-md-4"></div>
     <div class="col-md-6">
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    </div>
</div>