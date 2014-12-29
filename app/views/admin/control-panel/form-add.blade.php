@extends('admin.common.main')
@section('content')
    <div id="content">
        <div class="box">
            <div class="heading">
                <h1>Adding Camera</h1>
                <div class="buttons">
                    <a onclick="$('#form-add').submit();" class="button">Save</a>
                    <a href="/admin/control-panel" class="button">Cancel</a>
                </div>
            </div>
            <div class="content">
                <table style="width: 100%">
                    {{Form::open(array('url' => '/admin/control-panel/add', 'method' => 'post', 'files' => true , 'id' =>'form-add'))}}
                    <tr>
                        <td>   {{'Meta title: '}}</td>
                        <td> {{Form::text('meta_title')}}</td>
                    </tr>
                    <tr>
                        <td>{{'Meta keywords: '}}</td>
                        <td> {{Form::text('meta_keywords', null, array('size' => '100', 'maxlength' => '255'))}}</td>
                    </tr>
                    <tr>
                        <td> {{'Meta description: '}}</td>
                        <td>{{Form::text('meta_description')}}</td>
                    </tr>
                    <tr>
                        <td> {{'Meta_H1: '}}</td>
                        <td>{{Form::text('meta_h1')}}</td>
                    </tr>
                    <tr>
                        <td>{{'Name: '}}</td>
                        <td>{{Form::text('name')}}</td>
                    </tr>
                    <tr>
                        <td>{{'Video link: '}}</td>
                        <td>{{Form::text('video_link')}}</td>
                    </tr>
                    <tr>
                        <td> {{'Description: '}}</td>
                        <td>    {{Form::textarea('description')}}</td>
                    </tr>
                    <tr>
                        <td>{{'Category: '}}</td>
                        <td>{{Form::select('category_id', $data['categories'])}}</td>
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
                        <td>{{Form::file('image')}}</td>
                    </tr>
                    {{Form::close()}}
                </table>
            </div>
        </div>
    </div>
@stop