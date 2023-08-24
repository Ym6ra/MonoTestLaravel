<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         DB::table('clients')->insert([
            'id'=> 1,
            'name' => 'Иван Василиевич',
            'gender' => 'муж',
            'phone' => '8800553535',
            'address' => 'Ул. им Пушкина д. Колотушкина',
            'cars' => 1,
         ]);

         DB::table('autos')->insert([
            'client_id' => 1,
            'mark'=>'рено',
            'model'=>'седан',
            'color'=>'#000000',
            'number'=>'A001AA',
            'status'=>'Присутствует',
         ]);
    }
}
