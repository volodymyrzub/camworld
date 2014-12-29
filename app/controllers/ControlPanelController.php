<?php

class ControlPanelController extends BaseController
{
    public function index()
    {
        if (Auth::check()) {
            $cameras = array();
            $result = Camera::getCameras();
            foreach ($result as $camera) {
                $cameras[$camera->id]['id'] = $camera->id;
                $cameras[$camera->id]['name'] = $camera->name;
                $cameras[$camera->id]['image'] = Image::resize($camera->image, 80, 80);
            }
            return View::make('admin.control-panel.control-panel')->with('cameras', $cameras);
        }

        return Redirect::route('get-login');
    }

    public function formAdd()
    {
        if (Auth::check()) {
            $data['categories'] = $this->getCategories();
            return View::make('admin.control-panel.form-add')->with('data', $data);
        }
        return Redirect::route('get-login');
    }

    public function addCamera()
    {
        if (Auth::check()) {
            $param = Input::all();
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            Image::upload($tmp_name, $file_name);
            $file = Input::file('image');
            $param['image_name'] = Config::get('image.upload_dir') . '/' . $file->getClientOriginalName();
            Camera::addCamera($param);
            return Redirect::action('ControlPanelController@index');
        }
        return Redirect::route('get-login');

    }


    public function getFormUpdate($id)
    {
        if (Auth::check()) {
            $data['categories'] = $this->getCategories();
            $data['camera'] = Camera::getCameraById($id);
            return View::make('admin.control-panel.form-update')->with('data', $data);
        }
        return Redirect::route('get-login');
    }


    public function doUpdate()
    {
        if(Auth::check()) {
            $param = Input::all();
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $param['image'] = Config::get('image.upload_dir') . '/' . $file->getClientOriginalName();

            } else {
                $parm['image'] = $param['old_image'];
            }

            Camera::doUpdate($param);
            return Redirect::action('ControlPanelController@index');
        }
        return Redirect::route('get-login');
    }

    public function copy()
    {
        if(Auth::check()) {
            $selected = Input::get('selected');
            foreach ($selected as $select) {
                $saveCamera = array();
                $copyCamera = Camera::getCameraById($select);
                $saveCamera['meta_title'] = $copyCamera->meta_title;
                $saveCamera['meta_keywords'] = $copyCamera->meta_keywords;
                $saveCamera['meta_description'] = $copyCamera->meta_description;
                $saveCamera['meta_h1'] = $copyCamera->meta_h1;
                $saveCamera['name'] = $copyCamera->name;
                $saveCamera['video_link'] = $copyCamera->video_link;
                $saveCamera['image_name'] = $copyCamera->image;
                $saveCamera['description'] = $copyCamera->description;
                $saveCamera['category_id'] = $copyCamera->category_id;
                $saveCamera['time_zone'] = $copyCamera->time_zone;
                $saveCamera['rating'] = $copyCamera->rating;
                Camera::addCamera($saveCamera);
            }
            return Redirect::action('ControlPanelController@index');
        }
        return Redirect::route('get-login');
    }

    public function delete()
    {
        if(Auth::check()) {
            $selected = Input::get('selected');
            foreach ($selected as $select) {
                $this->deleteById($select);
            }
            return Redirect::action('ControlPanelController@index');
        }
        return Redirect::route('get-login');
    }

    private function getCategories()
    {
        $result = array();
        $categories = Categories::getCategoryAll();
        foreach ($categories as $category) {
            $result[$category->id] = $category->name;
        }
        return $result;
    }

    private function deleteById($id)
    {
        Camera::deleteRecordById($id);
    }
}