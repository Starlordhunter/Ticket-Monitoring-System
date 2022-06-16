<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function getState($stateId){ 
        
        $project = DB::table("projects")
        ->where("state_id",$stateId)
        ->pluck("name","id");
       // dd($project);
        return response()->json($project);
       

    }

    public function getproject($optionValue){ 
        
        $projects = DB::table("projects")
        ->where("id",$optionValue)
        ->get();
        return response()->json($projects);
       

    }

    public function getdepartment($projectId){ 
        
        $department = DB::table("department_area")
        ->where("project_id",$projectId)
        ->pluck("name","id");
       // dd($project);
        return response()->json($department);
       

    }
    
    // public function getdepartmentArea(Request $request){

    //     $data=DepartmentArea::select('name','id')->where('project_id',$request->id)
    //     ->take(100)->get();
    //     return response()->json($data);
    // }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
   
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'ic' => 'required|string|min:12',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string',
            'extensionNo' => 'required|string',
            'office' => 'required|string',
            'state'   => 'required|exists:state,id',
            'project'   => 'required|exists:projects,id',
            'departmentArea' =>'required|exists:department_area,id',
            'password' => 'required|string|min:6|confirmed',    
            'position' => 'required|string|max:255',
             
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     
        return User::create([
            'name' => $data['name'],
            'ic' => $data['ic'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'extensionNo' => $data['extensionNo'],
            'office' => $data['office'],
            'state_id' => $data['state'],
            'project_id' => $data['project'],
            'department_area_id' => $data['departmentArea'],         
            'status'=>"0",
            'position' => $data['position'],     
            'password' => Hash::make($data['password']
          
           
        ),
            
        ]);
       
        //  $department = $data['departmentArea'];

    }

    // public function activation($key)
    // {
    //     $auth_user = User::where('activation_key', $key)->first();
 
    //     if($auth_user) {
    //         $auth_user->status = 'active';
    //         $auth_user->save();
    //         return redirect('login')->with('success', 'Your account is activated. You can login now.');
    //     } else {
    //         return redirect('login')->with('error', 'Invalid activation key.');
    //     }
    // }
}
