@extends('admin.common.main')
@section('content')
    <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
        <div class="heading-login">
            <img src="img/lockscreen.png" alt="login"/>
            <span>{{Lang::get('login.text-heading')}}</span>
        </div>
        <div class="content-login">
            {{Form::open(array('url' => '/admin', 'method' => 'post'))}}
            {{Form::label('login', Lang::get('login.login'))}}<br>
            {{Form::text('email')}}<br>
            {{Form::label('password', Lang::get('login.password'))}}<br>
            {{Form::password('password')}}<br>
            <a href="#">{{Lang::get('login.text-forgot')}}</a><br>
            {{Form::submit(Lang::get('login.submit'))}}
            <div class="clearfix"></div>
            {{Form::close()}}
        </div>
        @if($errors)
            @foreach($errors->all() as $error)
                <div class="error">{{$error}}</div>
            @endforeach
        @endif
    </div>
@stop