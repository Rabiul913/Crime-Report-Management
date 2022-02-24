<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Auth;

class UserController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->get();
        
        return view('pages.users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
    // $proposals = Proposal::select("*")
    //     ->where("proposals.user_id",Auth::user()->id)
    //     ->get();
    //dd($proposals);
     $role_name = null;
     
    foreach($role as $item)
    {
        $role_name =$item->name;
    }

        $roles = Role::pluck('name','name')->all();

        return view('pages.users.create', compact('roles','role_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
            'ps_name'=>'required',
            'nationality'=>'required',
            'mobile'=>'required',
            'status'=>'required',
            'password' => 'required|same:confirm-password|min:8',
        ]);
    
        // dd($request);

        


        $input = $request->all();
        $input['present_address']=$request->pre_address."|".$request->pre_postal_code."|".$request->ps_name."|".$request->pre_district;
       
        $input['permanent_address']=$request->per_address."|".$request->per_postal_code."|".$request->per_ps_name."|".$request->per_district;
        // dd($input['permanent_address']);
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $districts=District::latest()->get();
        $userRole = $user->roles->pluck('name', 'name')->all();

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
   
     $role_name = null;
     
    foreach($role as $item)
    {
        $role_name =$item->name;
    }
// $array=[];
$present_address=explode('|', $user->present_address);
$permanent_address=explode('|', $user->permanent_address);
    // foreach(explode(',', $user->present_address) as $info) {
    //         $array['pre_address']=$info[0];
    //         $array['pre_p_code']=$info[1];
    //         $array['pre_ps']=$info[2];
    //         $array['pre_dis']=$info[3];

    // }
    // dd($array[0]);
    // $p_address=['pre_address'=>array[0],'pre_pcode'=>array[1],'pre_ps'=>array[2],'pre_dis'=>$array[3]];
    

    
        return view('pages.users.edit', compact('user','roles','districts','userRole','role_name','present_address','permanent_address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,            
            'roles' => 'required',
            'ps_name'=>'required',
            'nationality'=>'required',
            'mobile'=>'required',
            'status'=>'required',
            'password' => 'required|same:confirm-password|min:8',
        ]);
    
        $input = $request->all();

        $input['present_address']=$request->pre_address."|".$request->pre_postal_code."|".$request->ps_name."|".$request->pre_district;
       
        $input['permanent_address']=$request->per_address."|".$request->per_postal_code."|".$request->per_ps_name."|".$request->per_district;
        
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}