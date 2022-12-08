<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Board;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Profession;
use App\Models\Stclass;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Subobject extends Model
{
   use HasFactory;
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'country_id','state_id', 'city_id', 'board_id', 'exam_id', 'course_id', 'profession_id', 'stclass_id', 'status'
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
	public function board()
    {
        return $this->hasOne(Board::class, 'id', 'board_id');
    }
	public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
	public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
	public function profession()
    {
        return $this->hasOne(Profession::class, 'id', 'profession_id');
    }
	public function stclass()
    {
        return $this->hasOne(Stclass::class, 'id', 'stclass_id');
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
