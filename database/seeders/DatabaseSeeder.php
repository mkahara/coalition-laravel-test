<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sqlDumpPath = database_path('seeders/dumps/laravel_task_manager.sql'); //storage_path('app/laravel_task_manager.sql');

        // Check if the SQL dump file exists
        if (file_exists($sqlDumpPath)) {
            // Read the SQL dump file and execute its contents
            DB::unprepared(file_get_contents($sqlDumpPath));
        } else {
            $this->command->error("The SQL dump file ($sqlDumpPath) does not exist.");
        }
    }
}
