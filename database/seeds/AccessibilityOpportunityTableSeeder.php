<?php

use Illuminate\Database\Seeder;

class AccessibilityOpportunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accessibility_opportunity')->delete();

        $opportunity_count = App\Models\Opportunity::count();
        $accessibility_count = App\Models\Accessibility::count();

        $ratio = 1;  // ratio that get tagged

        for ($i = 0; $i < ($ratio * $opportunity_count); $i++) {
          DB::table('accessibility_opportunity')->insert([
            'opportunity_id' => rand(1,$opportunity_count),
            'accessibility_id' => rand(1,$accessibility_count)
          ]);
        }

    }
}
