<?php

class Categories extends Eloquent {

    public static function getCategoryAll(){
        $categories = Categories::all();
        return $categories;
    }
}