<?php

class CategoriesTableSeeder extends Seeder{

    public function run(){
        DB::table('categories')->delete();
        $cat = array(
            array(
                'name' => 'Animal',
                'image' => 'img/animal-category.png'
            ),
            array(
                'name' => 'Birds',
                'image' => 'img/birds-category.png'
            ),
            array(
                'name' => 'City',
                'image' => 'img/city-category.png'
            ),
            array(
                'name' => 'Nature',
                'image' => 'img/nature-category.png'
            ),
            array(
                'name' => 'Water',
                'image' => 'img/water-category.png'
            ),
            array(
                'name' => 'Other',
                'image' => 'img/other-category.png'
            ),
        );
        DB::table('categories')->insert($cat);
    }
}