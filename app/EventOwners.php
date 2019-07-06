<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventOwners extends Model
{
    protected $table = 'event_owners';
    protected $fillable = ['owner_id','name', 'file', 'address', 'city', 'description', 'price', 'event_categories', 'date', 'time'];

    public function users(){
        return $this->belongsTo('App\Users', 'id');
    }

    public function bookingTicket(){
        return $this->hasMany('App\BookingTicket', 'event_id');
    }
}
