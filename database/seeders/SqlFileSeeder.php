<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__.'/sql/etiquette.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = __DIR__.'/sql/categorie.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = __DIR__.'/sql/plat.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);

        $path = __DIR__.'/sql/etiquette_plat.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
