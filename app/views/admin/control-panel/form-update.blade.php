@extends('admin.common.main')
@section('content')
    <div id="content">
        <div class="box">
            <div class="heading">
                <h1>Update camera</h1>

                <div class="buttons">
                    <a onclick="$('#form-update').submit();" class="button">Save</a>
                    <a href="/admin/control-panel" class="button">Cancel</a>
                </div>
            </div>
            <div class="content">
                <table style="width: 100%">
                    {{Form::open(array('url' => '/admin/control-panel/update', 'method' => 'post', 'id' => 'form-update', 'files' => true))}}
                    <tr>
                        <td>   {{'Meta title: '}}</td>
                        <td> {{Form::text('meta_title', $data['camera']->meta_title)}}</td>
                    </tr>
                    <tr>
                        <td>{{'Meta keywords: '}}</td>
                        <td>{{Form::text('meta_keywords', $data['camera']->meta_keywords)}}</td>
                    </tr>
                    <tr>
                        <td> {{'Meta description: '}}</td>
                        <td>{{Form::text('meta_description', $data['camera']->meta_description)}}</td>
                    </tr>
                    <tr>
                        <td> {{'Meta_H1: '}}</td>
                        <td>{{Form::text('meta_h1', $data['camera']->meta_h1)}}</td>
                    </tr>
                    <tr>
                        <td>{{'Name: '}}</td>
                        <td>{{Form::text('name', $data['camera']->name)}}</td>
                    </tr>
                    <tr>
                        <td>{{'Video link: '}}</td>
                        <td>{{Form::text('video_link', $data['camera']->video_link)}}</td>
                    </tr>
                    <tr>
                        <td> {{'Description: '}}</td>
                        <td>{{Form::textarea('description',$data['camera']->description)}}</td>
                    </tr>
                    <tr>
                        <td>{{'Category: '}}</td>
                        <td> {{Form::select('category_id', $data['categories'], $data['camera']->category_id)}}</td>
                    </tr>
                    <tr>
                        <td>{{'Time zone: '}}</td>
                        <td>{{Form::select('time_zone', array('1'=>'zone +1'))}}</td>
                    </tr>
                    <tr>
                        <td>{{'Rating: '}}</td>
                        <td>{{Form::select('rating', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'))}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><img src="{{'/' . $data['camera']->image}}" width="100px" height="100px" alt=""/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{Form::file('image')}}</td>
                    </tr>
                    <tr>
                        <td>{{Form::hidden('old_image', $data['camera']->image)}}</td>
                        <td>{{Form::hidden('id', $data['camera']->id)}}<br></td>
                    </tr>
                    {{Form::close()}}
                </table>
            </div>
        </div>
    </div>
@stop