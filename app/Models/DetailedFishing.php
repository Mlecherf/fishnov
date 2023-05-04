<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedFishing extends Model
{
    use HasFactory;
    
    protected $table='detailed_fishing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_detailed_fishing',
        'id_fishing',
        'type_fish',
        'quantity'
    ];
}
