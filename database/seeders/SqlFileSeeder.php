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
        $paths = [
            __DIR__.'/sql/etiquette.sql',
            __DIR__.'/sql/categorie.sql',
            __DIR__.'/sql/plat.sql',
            __DIR__.'/sql/etiquette_plat.sql',
        ];

        foreach ($paths as $path) {
            $sql = file_get_contents($path);
            DB::unprepared($sql);
        }
    }
}
