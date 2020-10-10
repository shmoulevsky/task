<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tasks\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();
        DB::table('status')->insert([
            ['code' => 'backlog', 'title' => 'Беклог', 'class' => 'badge-secondary'],
            ['code' => 'inwork', 'title' => 'В работе', 'class' => 'badge-primary'],
            ['code' => 'finished', 'title' => 'Завершена', 'class' => 'badge-success']
        ]);
    }
}
