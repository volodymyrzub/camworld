<?php

class CamerasTableSeeder extends Seeder {

    public function run()
    {
            DB::table('cameras')->delete();
            DB::statement('ALTER TABLE `cameras` AUTO_INCREMENT=0');

        $cameras = array(
            array(
                'name' => 'Camera in forest Estonia',
                'image' => 'img/data/foto.jpg',
                'video_link' => 'rtmp://193.40.133.138/live/hirv',
                'description' => 'This webcam is located in the wild forest Estonia. You have no idea who you can see !!! Roe deer, foxes, wild boars, raccoons and this is just a small list of forest dwellers who come here to eat. The camera has night lighting and open 24 hours a day. At any time, you\'ll be sure to watch the wild beast, who has no idea that he was not alone.',
                'category_id' => '1',
                'rating' => '5'
            ),
            array(
                'name' => 'Online camera in the Polish forest',
                'image' => 'img/data/animal.jpg',
                'video_link' => 'rtmp://193.40.133.138/live/siga',
                'description' => 'The camera in the Polish forest. Here comes a lot of different animals. Sometimes would lead there to a terrible gray wolf.',
                'category_id' => '1',
                'rating' => '4'
            )
        );
        DB::table('cameras')->insert($cameras);
    }
}