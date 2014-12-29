<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CameraController extends BaseController
{
    public function index()
    {
        return View::make('template.camworld.camera');
    }

    public function getCamera($id)
    {
        $id = (int)$id;
        $data = array();
        try {
            $camera = Camera::getCameraById($id);
            $data['main_info'] = $camera;
            $data['image'] = Image::resize($camera->image, 800, 455);
            $data['photos'] = $this->getPhotos($id);
            $data['comments'] = $this->getComments($id);
        } catch (ModelNotFoundException     $e) {
            return 'this camera is not exist';
        }
        return View::make('template.camworld.camera')->with('camera', $data);
    }

    private function getPhotos($id)
    {
        $photos = Camera::find($id)->photos;
        return $photos;
    }

    private function getComments($id)
    {
        $comments = array();
        $result = Comment::getCommentsByCameraId($id);
        foreach ($result as $comment) {
            $comments[] = array(
                'author' => User::getNameUserById($comment->user_id),
                'text' => $comment->body,
                'date' => $comment->date
            );
        }
        return $comments;
    }

}