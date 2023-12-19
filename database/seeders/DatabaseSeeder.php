<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user=User::factory()->create([
            'name'=>'admin',
            'email'=>'admin@test.com'
        ]);

        User::factory(10)->create();

        Listing::factory(10)->create([
            'user_id'=>$user->id
        ]);

        Listing::factory(30)->create();
    }
}
