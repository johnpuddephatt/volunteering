<?php

use Illuminate\Database\Seeder;

use App\Models\Organisation;
use Illuminate\Support\Facades\Hash;

use Laracasts\TestDummy\Factory as TestDummy;

class OrganisationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('organisations')->delete();
        // TestDummy::$factoriesPath = 'database/factories';
        // $organisation = factory(Organisation::class, 3)->times(20)->create();

        DB::table('organisations')->insert([
          'name' => 'St George’s Community Centre',
          'slug' => 'st-georges-community-centre',
          'email' => 'info@stgeorgeslupset.org.uk',
          'password' => Hash::make('password'),
          'email_verified_at' => now(),
          'remember_token' => Str::random(10),
          'active' => true,
          'contact_name' => 'Wayne Kelly',
          'contact_role' => 'Administrator',
          'phone' => '0113 380 2809',
          'website' => 'http://stgeorgeslupset.org.uk',
          'info' => 'We’re St George’s and we provide happy, welcoming spaces where local people can feel part of something. As an independent charity we’ve been providing services and activities to improve health and wellbeing for over twenty years.',
          'logo' => 'images/seeding/stgeorges_logo.jpg'
        ]);

        DB::table('organisations')->insert([
          'name' => 'Elliot’s Footprint',
          'slug' => 'elliots-footprint',
          'email' => 'volunteer@elliotsfootprint.org',
          'password' => Hash::make('password'),
          'email_verified_at' => now(),
          'remember_token' => Str::random(10),
          'active' => true,
          'contact_name' => 'Stephen Dowson',
          'contact_role' => 'Communications coordinator',
          'phone' => '0113 123 0099',
          'website' => 'http://elliotsfootprint.org',
          'info' => 'We\'re a charity that helps families through child bereavement. We offer help and guidance whilst campaigning and fundraising for improved bereavement services.',
          'logo' => 'images/seeding/elliotsfootprint_logo.jpg'
        ]);
    }
}
