<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class University extends Model
{
    use HasFactory;
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'state_id',  'status'
    ];
	
	
	public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
	
}
