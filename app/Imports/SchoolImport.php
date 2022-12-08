<?php

namespace App\Imports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SchoolImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	public function rules(): array
	{
    return [
        'name' => 'unique:colleges,name|required',
		'status' => 'required'
    ];

	}
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {	
		$request = request()->all();
		
        return new School([
            'country_id'=> $request['country_id'],
			'state_id'=> $request['state_id'],
			'city_id'=> $request['city_id'],
			'board_id'=> $request['board_id'],
            'name'=> $row['name'],
            'status'=> $row['status'],
        ]);
    }
}
