<?php

use Illuminate\Database\Seeder;

class OpportunitySuitabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opportunity_suitability')->delete();

        $opportunity_count = App\Models\Opportunity::count();
        $suitability_count = App\Models\Suitability::count();

        $ratio = 1.5;  // ratio that get tagged

        for ($i = 0; $i < ($ratio * $opportunity_count); $i++) {
          DB::table('opportunity_suitability')->insert([
            'opportunity_id' => rand(1,$opportunity_count),
            'suitability_id' => rand(1,$suitability_count)
          ]);
        }

    }
}
