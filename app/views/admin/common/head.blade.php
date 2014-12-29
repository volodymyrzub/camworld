<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/jquery.min.js') }}
    @yield('script')
    <title>@yield('title')</title>
</head>
<body>
<div class="wrap">
    <header>
        <div class="container">
            <div class="row">
                <div class="cols col-3">
                    <a href="/"><img src="/img/logo.png" alt="logo"></a>
                </div>
            </div>
        </div>
    </header>
    <div class="move-line-top"></div>
    <div class="separate"></div>