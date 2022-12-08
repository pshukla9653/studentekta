<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class Location extends Model
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
