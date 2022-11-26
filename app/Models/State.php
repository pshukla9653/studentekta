<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class State extends Model
{
    use HasFactory;
	
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id', 'status'
    ];
	
	public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
