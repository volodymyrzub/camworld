<?php 
class CategoriesController extends BaseController{

	public function index()
	{
		$categories = Categories::getCategoryAll();
		return View::make('template.camworld.categories')->with('categories', $categories);
	}

}