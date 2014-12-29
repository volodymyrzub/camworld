<?php

class ListCamerasController extends BaseController
{
    public function index($id)
    {
        $cameras = array();
        $result = Camera::getCamerasByCategoryId($id);
        foreach($result as $camera){
            $cameras[$camera->id]['id'] = $camera->id;
            $cameras[$camera->id]['name'] = $camera->name;
            $cameras[$camera->id]['image'] = Image::resize($camera->image, 300, 300);
            $cameras[$camera->id]['rating'] = $camera->rating;
        }

        return View::make('template.camworld.list_cameras')->with('cameras', $cameras);
    }
}
