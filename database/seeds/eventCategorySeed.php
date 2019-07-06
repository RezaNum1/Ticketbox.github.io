<?php

use Illuminate\Database\Seeder;
use App\EventCategory;
use App\CreditCard;

class eventCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new EventCategory();
        $data->name = 'Concert';
        $data->save();


        $data = new EventCategory();
        $data->name = 'Seminar';
        $data->save();
    }
}
