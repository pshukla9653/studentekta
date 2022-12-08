<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class VillegeImport implements ToModel, WithHeadingRow, WithValidation
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	public function rules(): array
	{
    return [
        'name' => 'unique:universities,name|required',
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
		return new University([
            'country_id'=> $request['country_id'],
			'state_id'=> $request['state_id'],
            'name'=> $row['name'],
            'status'=> $row['status'],
            
        ]);
    }
}
