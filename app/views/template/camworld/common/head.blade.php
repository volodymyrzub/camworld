<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	@yield(('title'))
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/main.js') }}
	@yield('script')
	@yield(('meta'))
</head>
<body @yield('class_home')>
	<div class="wrap">
	<div class="bg">
		<div class="bg-1 current" data-bg="1"></div>
		<div class="bg-2" data-bg="2"></div>
		<div class="bg-3" data-bg="3"></div>
		<div class="bg-4" data-bg="4"></div>
		<div class="bg-5" data-bg="5"></div>
		<div class="bg-6" data-bg="6"></div>
	</div>
	<header>
		<div class="container">
			<div class="row">
				<div class="cols col-3">
					<a href="/"><img src="/img/logo.png" alt="logo"></a>
				</div>
				<div class="cols col-6 text-right">
					<nav class="menu">
						<ul>
							<li class="active"><a href="/">Home</a></li>
							<li><a href="/categories-6">OtherCameras</a></li>
							<li><a href="/about-us">AboutUs</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<div class="move-line-top"></div>
	<div class="separate"></div>