@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

		<ul class="list-group">
			@foreach ($categories as $category)
				<li class="list-group-item clearfix">
					{{ $category->name }} 
					<a class="btn btn-primary pull-right" href="{{ url('/categories/'.$category->id) }}">Edit</a>
				</li>
			@endforeach
		</ul>

	</div>
</div>

@endsection