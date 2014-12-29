@extends('template.camworld.common.main')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @foreach($cameras as $camera)
                <div class="cols col-3 text-center">
                    <a href="camera/{{$camera['id']}}"><img src="{{$camera['image']}}" alt="{{$camera['name']}}"></a>
                    <div class="additional">
                        <!--<span class="time_zone">Time zone: </span>-->
                        Rating
                        <div class="rating-{{$camera['rating']}}"></div>
                    </div>
                    <p class="camera-name"><a href="camera/{{$camera['id']}}">{{$camera['name']}}</a></p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop