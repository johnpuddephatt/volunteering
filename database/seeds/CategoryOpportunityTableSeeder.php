<?php

use Illuminate\Database\Seeder;

class CategoryOpportunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_opportunity')->delete();

        $opportunity_count = App\Models\Opportunity::count();
        $category_count = App\Models\Category::count();

        $ratio = 1;  // ratio that get tagged

        for ($i = 0; $i < ($ratio * $opportunity_count); $i++) {
          DB::table('category_opportunity')->insert([
            'opportunity_id' => rand(1,$opportunity_count),
            'category_id' => rand(1,$category_count)
          ]);
        }

    }
}
