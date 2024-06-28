<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'BookingID';
    protected $table = 'bookings';
    public function customer(){
        return $this->belongsTo(Customer::class,'CustomerID','CustomerID');
    }
    public function room(){
        return $this->belongsTo(Room::class,'RoomID','RoomID');
    }
    protected $fillable = ['BookingID','CustomerID','RoomID','checkin','checkout'];
    public function getKeyName()
    {
        return $this->primaryKey;
    }
}
