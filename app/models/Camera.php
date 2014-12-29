<?php
use Illuminate\Database\Eloquent\Relations\HasMany;

class Camera extends Eloquent
{
    public static $unguarded = true;

    public static function getCameras()
    {
        $cameras = Camera::all();
        return $cameras;
    }

    public static function getCameraById($id)
    {
        $camera = Camera::where('id', '=', $id)->firstOrFail();
        return $camera;
    }

    public static function getCamerasByCategoryId($id)
    {
        $cameras = Camera::where('category_id', '=', $id)->get();
        return $cameras;
    }

    public function photos()
    {
        return $this->hasMany('Photo');
    }

    public static function addCamera($param)
    {
        try {
            Camera::create(array(
                'meta_title' => $param['meta_title'],
                'meta_keywords' => $param['meta_keywords'],
                'meta_description' => $param['meta_description'],
                'meta_h1' => $param['meta_h1'],
                'name' => $param['name'],
                'video_link' => $param['video_link'],
                'image' => $param['image_name'],
                'description' => $param['description'],
                'category_id' => $param['category_id'],
                'time_zone' => $param['time_zone'],
                'rating' => $param['rating'],
            ));
        } catch (Exception $e) {
            return 'Camera was not add';
        }
    }

    public static function doUpdate($param)
    {
        Camera::where('id', '=', $param['id'])->update(array(
            'meta_title' => $param['meta_title'],
            'meta_keywords' => $param['meta_keywords'],
            'meta_description' => $param['meta_description'],
            'meta_h1' => $param['meta_h1'],
            'name' => $param['name'],
            'image' => $param['image'],
            'video_link' => $param['video_link'],
            'description' => $param['description'],
            'category_id' => $param['category_id'],
            'time_zone' => $param['time_zone'],
            'rating' => $param['rating'],
        ));
    }

    public static function deleteRecordById($id)
    {
        DB::beginTransaction();
        try {
            Photo::where("camera_id", $id)->delete();
            Comment::where('camera_id', $id)->delete();
            Camera::destroy($id);
        } catch (Exception $e) {
            DB::rollback();
        }
        DB::commit();
    }

}