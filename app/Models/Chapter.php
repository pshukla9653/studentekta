<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Chapter extends Model
{
    use HasFactory;
	
	/**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 'subject_id', 'status'
    ];
	
	public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
