@extends('template.camworld.common.main')
@section('script')
	{{ HTML::script('js/jwplayer/jwplayer.js') }}
	<script type="text/javascript">jwplayer.key="nAFjI6mv3O8Oc5k7bK18BuF5Pd81dJUlRvZf1Q==";</script>
@stop
@section('title')
	<title>{{$camera['main_info']->meta_title}}</title>
@stop
@section('meta')
	<meta name="keywords" content="{{$camera['main_info']->meta_keywords}}">
	<meta name="description" content="{{$camera['main_info']->meta_description}}">
@stop
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="cols col-9">
						@if(!empty($camera['main_info']->meta_h1) )
							<h1 class="head-title">{{$camera['main_info']->meta_h1}}</h1>
						@else
							<h1 class="head-title">{{$camera['main_info']->name}}</h1>
						@endif

					<div class="video-player">
						<div id="myElement">Loading the player...</div>
                        <script type="text/javascript">
                            jwplayer("myElement").setup({
                            	file: "{{$camera['main_info']->video_link}}",
                            	image: "{{$camera['image']}}",
        						width: '100%',
       							height: 455

                            });
						</script>
						<div class="tabs">
							<ul class="control-tabs">
								<li><a href="#">Comments</a></li>
								<li class="active"><a href="#">Description</a></li>
								<li><a href="#">Photos</a></li>
							</ul>
							<div class="tabs-content">
								<ul>
									<li>
										@foreach($camera['comments'] as $comment)
											<div class="comment">
												<p class="comment-author">{{$comment['author']}}</p>
												<p class="comment-text">{{$comment['text']}}</p>
												<p class="comment-date">{{$comment['date']}}</p>
											</div>
										@endforeach
									</li>
									<li class="active">{{$camera['main_info']->description}}</li>
									<li class="list-image">
										@foreach($camera['photos'] as $photo)
											<span><img src="/{{$photo->image}}" width="350" height="auto" alt="" /></span>
										@endforeach

									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop