<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class OpportunitiesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csv/opportunities.csv';
    }

    public function run()
    {
        DB::table('opportunities')->delete();
        parent::run();
    }
}
