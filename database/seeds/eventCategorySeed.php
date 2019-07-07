<?php

use Illuminate\Database\Seeder;
use App\EventCategory;
use App\City;

class eventCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new City();
        $data->city_name = 'Jakarta';
        $data->save();


        $data = new City();
        $data->city_name = 'Bandung';
        $data->save();

        $data = new City();
        $data->city_name = 'Bogor';
        $data->save();

        $data = new City();
        $data->city_name = 'Medan';
        $data->save();

        $data = new City();
        $data->city_name = 'Palembang';
        $data->save();

        $data = new City();
        $data->city_name = 'Yogyakarta';
        $data->save();

        $data = new City();
        $data->city_name = 'Surabaya';
        $data->save();

        $data = new City();
        $data->city_name = 'Malang';
        $data->save();

        $data = new City();
        $data->city_name = 'Bekasi';
        $data->save();

        $data = new City();
        $data->city_name = 'Tanggerang';
        $data->save();

        $data = new City();
        $data->city_name = 'Banten';
        $data->save();

    }
}
