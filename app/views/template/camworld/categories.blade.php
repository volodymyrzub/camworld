@extends('template.camworld.common.main')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				@foreach($categories as $category)
				<div class="cols col-3">
					<div class="top-category">
						<a href=""><img src="{{$category->image}}" alt="{{$category->name}}"></a>
					</div>
					<div class="name-category"><a href="categories-{{$category->id}}" data-item="1">{{$category->name}}</a></div>
				</div>
			@endforeach
		</div>



	</section>
@stop
@section('class_home')
	class='home'
@stop