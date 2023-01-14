<?php

namespace Database\Seeders;

use App\Models\Counsellor;
use App\Models\CounsellorEducation;
use App\Models\CounsellorLanguage;
use App\Models\Translator;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Demo',
            'email' => 'hellohelpline.id@gmail.com',
            'timezone' => 'Asia/Jakarta',
            'unhcr_number' => rand(111, 999) . '-' . rand(),
            'country' => 'Sudan',
            'birthdate' => '2008-08-28',
            'sex' => 'male',
            'password' => Hash::make('Support.t0day22'),
        ]);

        $counsellor = new Counsellor();

        $counsellor->fill([
            'name' => 'Counsellor Demo',
            'email' => 'counsellor@helpline.id',
            'password' => Hash::make('Psychologi5t.22'),
            'bio' => "I'm a trained counsellor and a reader in the world
of children and family. In both roles, I believe that
our lives are made from lots of stories. In my
practice, I ask, challenge, and empower the
thoughts and patterns people bring in their
stories–and give them deeper meaning.",
            'image' => 'default_pp.jpeg',
            'timezone' => 'Asia/Jakarta'
        ]);
        $counsellor->saveOrFail();

        $educations = [
            [
                "institution" => "Universitas Surabaya",
                "major" => "Bachelors Degree in Psychology",
            ],
            [
                "institution" => "Universitas Surabaya",
                "major" => "Masters Degree in Clinical Psychology",
            ],
        ];

        $languages = [
            [
                "language" => "Bahasa Indonesia"
            ],
            [
                "language" => "English"
            ]
        ];

        foreach ($educations as $education) {
            CounsellorEducation::create([
                'counsellor_id' => $counsellor->id,
                'institution' => $education['institution'],
                'major' => $education['major']
            ]);
        }

        foreach ($languages as $language) {
            CounsellorLanguage::create([
                'counsellor_id' => $counsellor->id,
                'language' => $language['language'],
            ]);
        }

        Translator::create([
            'name' => 'Translator Demo',
            'email' => 'translator@helpline.id',
            'language' => 'Arabic',
            'timezone' => 'ASia/Jakarta',
            'password' => Hash::make('!ntegrat3.22'),
        ]);
    }
}
