<?php

namespace App\Imports;

use App\Models\College;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CollegeImport implements ToModel, WithHeadingRow, WithValidation
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
        return new College([
            'country_id'=> $request['country_id'],
			'state_id'=> $request['state_id'],
			'city_id'=> $request['city_id'],
			'university_id'=> $request['university_id'],
            'name'=> $row['name'],
            'status'=> $row['status'],
        ]);
    }
}
