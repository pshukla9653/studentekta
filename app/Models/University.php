<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;


class University extends Model
{
    use HasFactory;
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id', 'state_id',  'status'
    ];
	
	
	public function state()
    {
        return $this->hasOne(Location::class, 'id', 'state_id');
    }
	
	
	
}
