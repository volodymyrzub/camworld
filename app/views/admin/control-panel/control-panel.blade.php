@extends('admin.common.main')
@section('content')
    <div class="container" style="text-align: center"><a href="/admin/logout">Logout</a></div>
    <div id="content">
        <div class="box">
            <div class="heading">
                <h1>Cameras</h1>

                <div class="buttons">
                    <a href="{{URL::to('/admin/control-panel/add')}}" class="button">Add</a>
                    <a onclick="$('#form-list').attr('action', $(location).attr('href') + '/copy'); $('#form-list').submit(); " class="button">Copy</a>
                    <a onclick="$('#form-list').attr('action', $(location).attr('href') + '/delete'); $('#form-list').submit(); " class="button">Delete</a>
                </div>
            </div>
            <div class="clear"></div>
            <div class="content">
                <div class="list-cameras">
                    {{Form::open(array('url' => '/admin/control-panel', 'id' => 'form-list', 'files' => true))}}
                    <table class="list">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Image</td>
                            <td>Name camera</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        @foreach($cameras as $camera)
                            <tr>
                                <td>{{Form::checkbox('selected[]', $camera['id'])}}</td>
                                <td style="text-align: center"><img src="{{$camera['image']}}"/></td>
                                <td style="text-align: left">{{$camera['name']}}</td>
                                <td style="text-align: right; padding-right: 5px">
                                    <a href="{{URL::to('/admin/control-panel/update')}}{{'/' . $camera['id']}}">Update</a>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop