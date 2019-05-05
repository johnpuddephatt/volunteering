<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class OpportunitiesTableSeeder extends Seeder
{
    public function __construct()
    {
    }

    public function run()
    {
        DB::table('opportunities')->delete();

        DB::table('opportunities')->insert([
          'created_at' => new Carbon('last friday'),
          'updated_at' => new Carbon('last friday'),
          'validated_at' => new Carbon('last friday'),
          'organisation_id' => 1,
          'title' => 'Project Volunteer - Design and Content',
          'slug' => 'project-volunteer-design-and-content',
          'intro' => 'Could your keen eye for design help improve our communications?',
          'description' => '<p>Christian Aid has a vision of a better world, where everyone can live a full life, free from poverty. We believe that vision can become a reality. The Volunteering team supports all staff across the UK to work in partnership with volunteers, by providing guidance, advice, training and resources, to achieve this vision.</p><p>This is an exciting time to join us, as we bring our new volunteering plans to life, but we need your help to create the new materials needed to get us there.</p><p>You\'d be joining our Big River Project, which aims to transform and improve the way we work with volunteers. In particular, you\'ll be helping us to design new resources to improve our volunteer experience. This could include new posters at volunteer recruitment fairs, our new volunteer handbook, \'thank you\' certificates, e-newsletters - we have plenty of ideas! Do you have some too?</p>',
          'places' => 2,
          'skills_gained' => json_encode(array_slice(config('volunteering.skills'), 0, 2)),
          'skills_needed' => json_encode(array_slice(config('volunteering.skills'), 3, 5)),
          'requirements' => json_encode(array_slice(config('volunteering.requirements'), 2, 3)),
          'from_home' => 0,
          'address_ward' => 'Wakefield North',
          'address' => '{"route": "Northgate", "value": "71 Northgate, Wakefield, UK", "latlng": {"lat": 53.6849915, "lng": -1.5003553000000238}, "country": "United Kingdom", "postal_code": "WF1 3BS", "postal_town": "Wakefield", "street_number": "71", "administrative_area_level_1": "England", "administrative_area_level_2": "West Yorkshire"}',
          'minimum_age' => 18,
          'phone' => '',
          'email' => '',
          'frequency' => 'One off',
          'hours' => 4,
          'start_date' => '2019-03-21',
          // 'end_date' => '',
          'expenses' => 'Reasonable out of pocket expenses will be covered'
        ]);

        DB::table('opportunities')->insert([
          'created_at' => new Carbon('last monday'),
          'updated_at' => new Carbon('last monday'),
          'validated_at' => new Carbon('last monday'),
          'organisation_id' => 2,
          'title' => 'Fundraising Team Member',
          'slug' => 'fundraising-team-member',
          'intro' => 'We\'re looking for people who can help us raise £90,000',
          'description' => '<p>Elliot\'s Footprint, a Leeds based charity who supports bereaved families, is looking for enthusiastic and innovative fundraisers to help it carry its mission to offer help and guidance whilst campaigning and fundraising for improved bereavement services.</p><p>With your help we will:</p><ol><li>Improve the support available to families in the future. We are working hard to raise £90,000 to pay for a Bereavement Counsellor to be based in Leeds.</li><li>Raise awareness of the needs of bereaved families, make good quality and relevant information easily available and fundraise to ensure that families can access the bereavement support they need, when and where they need it.</li><li>Fund training for teachers in schools so that they can be better equipped to assist students who have been impacted by a sudden family loss.</li></ol><p>We are still a very young charity and we have big ambitions and aspirations for helping the many families who will face devastating loss without the adequate and appropriate bereavement support that they so desperately need.</p>',
          'places' => 5,
          'skills_gained' => json_encode(array_slice(config('volunteering.skills'), 0, 2)),
          'skills_needed' => json_encode(array_slice(config('volunteering.skills'), 3, 5)),
          'requirements' => json_encode(array_slice(config('volunteering.requirements'), 0, 1)),
          'from_home' => 1,
          // 'address_ward' => 'Wakefield North',
          // 'address' => '{"route": "Northgate", "value": "71 Northgate, Wakefield, UK", "latlng": {"lat": 53.6849915, "lng": -1.5003553000000238}, "country": "United Kingdom", "postal_code": "WF1 3BS", "postal_town": "Wakefield", "street_number": "71", "administrative_area_level_1": "England", "administrative_area_level_2": "West Yorkshire"}',
          'minimum_age' => 16,
          'phone' => '',
          'email' => '',
          'frequency' => 'Ongoing',
          'hours' => 2,
          // 'start_date' => '2019-04-21',
          // 'end_date' => '',
          'expenses' => 'Travel expenses covered.'
        ]);

        DB::table('opportunities')->insert([
          'created_at' => new Carbon('last wednesday'),
          'updated_at' => new Carbon('last wednesday'),
          'validated_at' => new Carbon('last wednesday'),
          'organisation_id' => 2,
          'title' => 'Marathon Volunteer',
          'slug' => 'marathon-volunteer',
          'intro' => 'Help us make this year’s marathon the best yet!',
          'description' => '<p>Do you want an opportunity to take part in an amazing charity event day experience, to do something incredible, and to change people\'s lives?</p><p>Join our Leeds Half Marathon volunteer team on Sunday 12 May 2019 and unite with our runners in the fight against dementia! We have two roles available - cheer team volunteers and team marshal volunteers.</p>',
          'places' => 20,
          'skills_gained' => json_encode(array_slice(config('volunteering.skills'), 3, 4)),
          'skills_needed' => json_encode(array_slice(config('volunteering.skills'), 4, 5)),
          'requirements' => json_encode(array_slice(config('volunteering.requirements'), 2, 3)),
          'from_home' => 1,
          'address_ward' => 'Wakefield Central',
          'address' => '{"value":"Wakefield Town Hall, Wood Street, Wakefield, UK","latlng":{"lat":53.6837414,"lng":-1.5004544999999325},"route":"Wood Street","postal_town":"Wakefield","administrative_area_level_2":"West Yorkshire","administrative_area_level_1":"England","country":"United Kingdom","postal_code":"WF1 2HQ"}',
          'minimum_age' => 18,
          'phone' => '',
          'email' => '',
          'frequency' => 'One-off',
          'hours' => 8,
          'start_date' => '2019-08-21',
          'end_date' => '2019-08-21',
          // 'expenses' => 'Travel expenses covered.'
        ]);

        DB::table('opportunities')->insert([
          'created_at' => new Carbon('last friday'),
          'updated_at' => new Carbon('last friday'),
          'validated_at' => new Carbon('last friday'),
          'organisation_id' => 2,
          'title' => 'School governor',
          'slug' => 'school-governor',
          'intro' => 'We’re looking for someone to help guarantee the future of this outstanding-rated school',
          'description' => '<p>Governing bodies are responsible for the strategic management of a school and will make decisions about a wide range of issues</p><p>The core responsibilities involved are:</p><ol><li>Ensuring accountability</li><li>Acting as a critical friend to the Head Teacher</li><li>Monitoring and evaluating the school\'s progress</li><li>Budgetary allocation and control</li><li>Shaping plans for school improvement and overseeing their implementation</li><li>Setting the school\'s aims and values</li><li>Appointing senior members of staff including the Head Teacher</li></ol><p>The governing body is usually split in to a small number of committees, each responsible for one area such as finance or pupil achievement. These committees will meet separately from the main governing body to discuss relevant issues in more detail. Discussion is then fed back at a full governing body meeting.</p><p>A school governing body is made up of representatives from the school, the parents, the local authority and the local community.</p>',
          'places' => 1,
          'skills_gained' => json_encode(array_slice(config('volunteering.skills'), 1, 2)),
          'skills_needed' => json_encode(array_slice(config('volunteering.skills'), 2, 3)),
          'requirements' => json_encode(array_slice(config('volunteering.requirements'), 3, 4)),
          'from_home' => 0,
          'address_ward' => 'Ackworth, North Elmsall and Upton',
          'address' => '{"value":"Wakefield Independent School, Doncaster Road, Nostell, Wakefield, UK","latlng":{"lat":53.64953569999999,"lng":-1.3871676999999636},"premise":"The Nostell Centre","route":"Doncaster Road","locality":"Nostell","postal_town":"Wakefield","administrative_area_level_2":"West Yorkshire","administrative_area_level_1":"England","country":"United Kingdom","postal_code":"WF4 1QG"}',
          'minimum_age' => 18,
          'phone' => '0173 287 0123',
          'email' => '',
          'frequency' => 'Ongoing',
          'hours' => 3,
          'start_date' => '2019-09-05',
          // 'end_date' => '2019-08-21',
          // 'expenses' => 'Travel expenses covered.'
        ]);
    }
}
