<?php

namespace App\Imports;
use Response;
use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;

class VillegeImport implements ToCollection, WithHeadingRow, WithValidation
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	public function rules(): array
	{
    return [
        'name' => 'required',
		'status' => 'required'
    ];

	}
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection  $rows)
	{
		
		
        $request = request()->all();
		$get_villege = Location::Select("id", "Villeges")->Where('id', $request['state_id'])->get();
		$newid = 0;
		$newdata = array();
		foreach($rows as $row){
			
			if(stripos($get_villege[0]['Villeges'], $row['name']) !== false){
				return redirect()->route('locations.index')->with('error', 'Error: Villege name '.$row["name"].' is already found!');
			}
			else{
				 $villege_array = json_decode($get_villege[0]['Villeges'], true);
				 //dd($villege_array);
				 if($villege_array == null){
					 if($newid == 0){
							$newid = 1;
							
						}
						else{
							$newid++;
						}
						
						$newvillege['id'] = "$newid";
						$newvillege['name'] = $row['name'];
						
						$newdata[] = $newvillege;
				 }
				 else{
				 foreach($villege_array as $key => $city_data){
					 
					 if($key == (int)$request['city_id']){
						$lastrow = count($city_data) -1;
					 //dd($lastrow);
						
						$lastid = $villege_array[$key][$lastrow]['id'];
						if($newid == 0){
							$newid = $lastid + 1;
							
						}
						else{
							$newid++;
						}
						
						$newvillege['id'] = "$newid";
						$newvillege['name'] = $row['name'];
						
						$newdata[] = $newvillege;
						
						
					 }
					 else{
						 if($newid == 0){
							$newid = 1;
							
						}
						else{
							$newid++;
						}
						
						$newvillege['id'] = "$newid";
						$newvillege['name'] = $row['name'];
						
						$newdata[] = $newvillege;
					 }
					 //
				 }
				 }
				
			}
		}
		if($villege_array == null){
			$villege_array[$request['city_id']] = $newdata;
		}
		else{
			if($villege_array){
				foreach($villege_array as $city_id=>$villegedata){
					if($city_id == $request['city_id']){
						foreach($newdata as $k=>$v){
							array_push($villege_array[$request['city_id']], $v);
						}
					}
					else{
						$villege_array[$request['city_id']] = $newdata;
					}
				}
				
			}
			
		}
		
		$finaldata = json_encode($villege_array);
		//dd($finaldata);
		//
		if($finaldata){
		
		Location::where('id', $request['state_id'])->update(['villeges' => $finaldata]);
		return redirect()->route('locations.index')->with('success', 'Villege Import Successfull.');
		}
		//dd($finaldata);
		//
		
    }
}
