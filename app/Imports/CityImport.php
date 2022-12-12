<?php

namespace App\Imports;
use Response;
use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;

class CityImport implements ToCollection, WithHeadingRow, WithValidation
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
		$get_city = Location::Select("id", "Cities")->Where('id', $request['state_id'])->get();
		
		$newid = 0;
		$newdata = array();
		foreach($rows as $row){
			
			if(stripos($get_city[0]['Cities'], $row['name']) !== false){
				return redirect()->route('locations.index')->with('error', 'Error: City name '.$row["name"].' is already found!');
			}
			else{
				 $city_array = json_decode($get_city[0]['Cities'], true);
				// dd($city_array);
				 if($city_array == null){
				if($newid == 0){
					$newid = 1;
					
				}
				else{
					$newid++;
				}
				
				$newcity['id'] = "$newid";
				$newcity['name'] = $row['name'];
				$newdata[] = $newcity;
				}
				else{
				$lastrow = count($city_array) - 1;
				$lastid = $city_array[$lastrow]['id'];
				if($newid == 0){
					$newid = $lastid + 1;
				}
				else{
					$newid++;
				}
				
				$newcity['id'] = "$newid";
				$newcity['name'] = $row['name'];
				
				$newdata[] = $newcity;
				
				}
			
			
				
			}
		}
		
		if($city_array ==null){
			$city_array = $newdata;
		}
		else{

				foreach($newdata as $k=>$v){
					array_push($city_array, $v);

			}
		}
		
		$finaldata = json_encode($city_array);
		//
		//dd($finaldata);
		if($finaldata){
		
		Location::where('id', $request['state_id'])->update(['cities' => $finaldata]);
		return redirect()->route('locations.index')->with('success', 'Cities Import Successfull.');
		}
		//dd($finaldata);
		//
		
    }
}
