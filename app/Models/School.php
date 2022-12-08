<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Board;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class School extends Model
{
    use HasFactory;
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id','state_id','city_id','board_id', 'status'
    ];
	
	public function state()
    {
        return $this->hasOne(Location::class, 'id', 'state_id');
    }
	public function board()
    {
        return $this->hasOne(Board::class, 'id', 'board_id');
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
