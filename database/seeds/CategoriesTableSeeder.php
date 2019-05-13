<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();

        $data = array(
            array('label' => 'Arts', 'slug' => 'arts', 'image' => 'images/seeding/categories/arts.jpg'),
            array('label' => 'Nature & animals', 'slug' => 'nature', 'image' => 'images/seeding/categories/environment.jpg'),
            array('label' => 'Faith', 'slug' => 'faith', 'image' => 'images/seeding/categories/faith.jpg'),
            array('label' => 'Health & Disability', 'slug' => 'health', 'image' => 'images/seeding/categories/health.jpg'),
            array('label' => 'LGBT', 'slug' => 'LGBT', 'image' => 'images/seeding/categories/lgbt.jpg'),
            array('label' => 'Men', 'slug' => 'Men', 'image' => 'images/seeding/categories/men.jpg'),
            array('label' => 'Older people', 'slug' => 'older-people', 'image' => 'images/seeding/categories/older-people.jpg'),
            array('label' => 'Sports & activities', 'slug' => 'sports-activities', 'image' => 'images/seeding/categories/sports.jpg'),
            array('label' => 'Vulnerable people', 'slug' => 'vulnerable-people', 'image' => 'images/seeding/categories/vulnerable.jpg'),
            array('label' => 'Women', 'slug' => 'women', 'image' => 'images/seeding/categories/women.jpg'),
            array('label' => 'Young people', 'slug' => 'young', 'image' => 'images/seeding/categories/children.jpg')
        );

        DB::table('categories')->insert($data);
    }
}
