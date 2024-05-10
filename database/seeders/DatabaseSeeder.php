<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'John Weak',
            'email' => 'weak@john.com',
            'password' => Hash::make('password'),
        ]);

      \App\Models\User::factory(300)->create();

        $users = \App\Models\User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            \App\Models\Scholarprovider::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $scholarproviders = \App\Models\Scholarprovider::all();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Scholarship::factory()->create([
                'scholarprovider_id' => $scholarproviders->random()->id
            ]);
        }

        foreach ($users as $user) {
            $scholarships = \App\Models\Scholarship::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($scholarships as $scholarship) {
                \App\Models\ScholarshipApplication::factory()->create([
                    'scholarship_id' => $scholarship->id,
                    'user_id' => $user->id
                ]);
            }
        }



        
    }
}
