<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();

  		//disable foreign key check for this connection before running seeders
  		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(AdminsTableSeeder::class);
        $this->call(AccessibilitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SuitabilitiesTableSeeder::class);

        // $this->call(OrganisationsTableSeeder::class);

        // $this->call(OpportunitiesTableSeeder::class);
        // $this->call(CategoryOpportunityTableSeeder::class);
        // $this->call(OpportunitySuitabilityTableSeeder::class);
        // $this->call(AccessibilityOpportunityTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
