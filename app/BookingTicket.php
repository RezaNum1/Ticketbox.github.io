<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTicket extends Model
{
    protected $table = 'booking_ticket';
    protected $fillable = ['customer_id', 'owner_id', 'event_id', 'quantity', 'total_price', 'booking_code'];

    public function users(){
        return $this->belongsTo('App\Users', 'customer_id');
    }

    public function eventOwners(){
        return $this->belongsTo('App\EventOwners', 'event_id');
    }
}
