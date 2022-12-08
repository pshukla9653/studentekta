<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class Village extends Model
{
    use HasFactory;
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id','state_id', 'city_id', 'status'
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
	
	public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();           
            $model->created_by = $user->id;
			
            
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->updated_by = $user->id;
        });       
    }
	public function createdby()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
	
	public function updatedby()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
