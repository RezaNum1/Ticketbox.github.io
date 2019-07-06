<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'username', 'password', 'email', 'phone'];

    public function eventowners(){

        return $this->hasMany('App\EventOwners', 'owner_id');
    }

    public function bookingUser(){
        return $this->hasMany('App\BookingTicket', 'customer_id');
    }

    public function bookingOwner(){
        return $this->hasMany('App\BookingTicket', 'owner_id');
    }

}
