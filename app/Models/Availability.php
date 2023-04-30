<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Availability extends Model
{
    use HasFactory;
    public $table = 'availability';

    protected $fillable = [
        'customer_id',
        'driver_id',
        'book_datetime',
        'status',
        'notes'
    ];
    
    public function driver() {
        return $this->belongsTo(User::class);
    }

    public function customer() {
        return $this->belongsTo(User::class);
    }
}
