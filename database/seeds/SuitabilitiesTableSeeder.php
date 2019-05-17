<?php
use Illuminate\Database\Seeder;

class SuitabilitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('suitabilities')->delete();

        $data = array(
            array('label' => 'People new to volunteering', 'slug' => 'first-time', 'image' => 'images/seeding/suitabilities/first-time.jpg'),
            array('label' => 'People who are shy', 'slug' => 'shy', 'image' => 'images/seeding/suitabilities/nervous-shy.jpg'),
            array('label' => 'People under 18', 'slug' => 'under-18s', 'image' => 'images/seeding/suitabilities/under-18s.jpg'),
            array('label' => 'People with limited mobility', 'slug' => 'limited-mobility', 'image' => 'images/seeding/suitabilities/limited-mobility.jpg'),
            array('label' => 'People volunteering together', 'slug' => 'friends', 'image' => 'images/seeding/suitabilities/friends-together.jpg'),
            array('label' => 'People seeking work', 'slug' => 'seeking-work', 'image' => 'images/seeding/suitabilities/seeking-work.jpg'),
            array('label' => 'People who are older', 'slug' => 'older-people', 'image' => 'images/seeding/suitabilities/older-people.jpg'),
            array('label' => 'People who like being outdoors', 'slug' => 'outdoors', 'image' => 'images/seeding/suitabilities/outdoors.jpg'),
            array('label' => 'People working on their wellbeing', 'slug' => 'wellbeing', 'image' => 'images/seeding/suitabilities/mental-wellbeing.jpg'),
        );

        DB::table('suitabilities')->insert($data);
    }
}
