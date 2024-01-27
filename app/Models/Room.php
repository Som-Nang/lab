<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $primaryKey = 'room_id';

    public $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'room_id',
        'name',
        'description',
        'status',
        'capacity',
        'user_id',
    ];
}
