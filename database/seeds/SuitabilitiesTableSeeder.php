<?php
use Illuminate\Database\Seeder;

class SuitabilitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('suitabilities')->delete();

        $data = array(
            array('label' => 'First-time volunteers', 'slug' => 'first-time'),
            array('label' => 'People who are nervous/shy', 'slug' => 'shy'),
            array('label' => 'Under-18s', 'slug' => 'under-18s'),
            array('label' => 'People with limited mobility', 'slug' => 'limited-mobility'),
            array('label' => 'Friends volunteering together', 'slug' => 'friends'),
            array('label' => 'People seeking work', 'slug' => 'seeking-work'),
            array('label' => 'Older people', 'slug' => 'older-people'),
            array('label' => 'People who like being outdoors', 'slug' => 'outdoors'),
        );

        DB::table('suitabilities')->insert($data);
    }
}
