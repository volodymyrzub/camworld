<?php

/**
 * Created by PhpStorm.
 * User: manpro
 * Date: 19.12.2014
 * Time: 13:06
 */
class Comment extends Eloquent
{
    public static function getCommentsByCameraId($id)
    {
        $comments = Comment::where('camera_id', '=', $id)->get();
        return $comments;
    }
}