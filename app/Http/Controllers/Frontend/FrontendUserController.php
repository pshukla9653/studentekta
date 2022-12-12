<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Frontend\FrontendUser;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
class FrontendUserController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('frontend.splash');
    }
	
	public function authMobile(){
		$countries 		= Location::select('isd_code', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		return view('frontend.mobile', compact('countries'));
	}
	
	public function login()
    {
        return view('frontend.login');
    }
	
	public function customLogin(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('number', 'password');
		
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration(Request $request)
    {	
	//dd($request);
        return view('frontend.register');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
   
	
	public function fetchStatus(Request $request)
    {
		
		$status = FrontendUser::where("mobile", $request->mobile)->get(["step_1", "step_2"]);
		return response()->json($status);
		
    }
	
	public function mobileAuthenticate(Request $request){
		
		$create = FrontendUser::create($request->all());
		return response()->json($create);
		
	}
}
