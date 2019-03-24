<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $data = array(
            array('label' => 'Arts', 'slug' => 'arts'),
            array('label' => 'Children & Young people', 'slug' => 'young'),
            array('label' => 'Crisis / Poverty', 'slug' => 'crisis'),
            array('label' => 'Heath & Disability', 'slug' => 'health'),
            array('label' => 'Environment, nature & animals', 'slug' => 'environment'),
            array('label' => 'Faith', 'slug' => 'faith'),
            array('label' => 'LGBT', 'slug' => 'LGBT'),
            array('label' => 'Men', 'slug' => 'Men'),
            array('label' => 'Older people', 'slug' => 'older-people'),
            array('label' => 'Refugees', 'slug' => 'refugees'),
            array('label' => 'Sports', 'slug' => 'sports'),
            array('label' => 'Women', 'slug' => 'women')
        );

        DB::table('categories')->insert($data);
    }
}
