<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\University;
class College extends Model
{
    use HasFactory;
	
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id','state_id','city_id','university_id', 'status'
    ];
	
	public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
	public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
	public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
	public function university()
    {
        return $this->hasOne(University::class, 'id', 'university_id');
    }
}