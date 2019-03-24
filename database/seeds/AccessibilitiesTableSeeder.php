<?php
use Illuminate\Database\Seeder;

class AccessibilitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accessibilities')->delete();

        $data = array(
            array('label' => 'Accessible toilet(s)', 'slug' => 'toilet'),
            array('label' => 'Autism friendly', 'slug' => 'autism'),
            array('label' => 'Wheelchair accessible', 'slug' => 'wheelchair'),
        );

        DB::table('accessibilities')->insert($data);
    }
}
