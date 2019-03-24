<?php

use Illuminate\Database\Seeder;

use App\Models\Organisation;
use Laracasts\TestDummy\Factory as TestDummy;

class OrganisationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('organisations')->delete();
        TestDummy::$factoriesPath = 'database/factories';
        $organisation = factory(Organisation::class, 3)->times(20)->create();
    }
}
