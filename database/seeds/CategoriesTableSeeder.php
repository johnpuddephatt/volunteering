<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $data = array(
            array('label' => 'Arts', 'slug' => 'arts'),
            array('label' => 'Young people', 'slug' => 'young'),
            array('label' => 'Vulnerable people', 'slug' => 'vulnerable-people'),
            array('label' => 'Health & Disability', 'slug' => 'health'),
            array('label' => 'Environment, nature & animals', 'slug' => 'environment'),
            array('label' => 'Faith', 'slug' => 'faith'),
            array('label' => 'LGBT', 'slug' => 'LGBT'),
            array('label' => 'Men', 'slug' => 'Men'),
            array('label' => 'Older people', 'slug' => 'older-people'),
            array('label' => 'Sports', 'slug' => 'sports'),
            array('label' => 'Women', 'slug' => 'women')
        );

        DB::table('categories')->insert($data);
    }
}
