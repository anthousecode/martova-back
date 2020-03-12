<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LABEL:
        $areas = file_get_contents(public_path() . '/areas.json');
        if (!$areas) {
            file_put_contents(public_path() . '/areas.json', \App\Models\Area::all()->toJson());
            goto LABEL;
        }
        \App\Models\Area::insert(json_decode($areas));
    }
}
