<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\Designation;
use App\Models\Tender_type;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete',['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit|user-edituser', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1)-1)*5);
    }

    public function vendor()
    {
        $data = User::join("model_has_roles","model_has_roles.model_id","=","users.id")
        ->join("roles","model_has_roles.role_id","=","roles.id")
        ->where('roles.name','Vendor')->paginate(5);

        // dd($data);

        return view('users.vendor',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        
        return view('users.create',compact('roles'));
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
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
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
        return view('users.show',compact('user'));
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
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        $designations = Designation::pluck('name','name')->all();

        $tender_types=Tender_type::latest()->get();

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
   
    $role_name = null;
    foreach($role as $item)
    {
        $role_name =$item->name;
    }
        if($role_name=='Vendor'){
        return view('users.edit_user',compact('user','roles','userRole','designations','tender_types'));
        }
        else{
            return view('users.edit',compact('user','roles','userRole'));
        }

        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
   
    $role_name = null;
    foreach($role as $item)
    {
        $role_name =$item->name;
    }

// dd($request);
    
// dd($request->trade_licence);

    if($role_name=="Vendor"){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'contact_person_name' => 'required',
            'designation' => 'required',
            'trade_licence' => 'mimes:pdf|max:5048',
            'tin_certificate' => 'mimes:pdf|max:5048',
            'vat_certificate' => 'mimes:pdf|max:5048',
            'ci'=>'mimes:pdf|max:5048',
        ]);


// dd($request->file('trade_licence'));



    }else{
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    }
   
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }


// start trade licence
    
        if ($trade = $request->file('trade_licence')) {
            if($user->trade_licence != null){
                unlink("file/users/trade_licence/".$user->trade_licence);
            }
            $destinationPath = 'file/users/trade_licence';
            $tradefile = date('YmdHis') . "." . $trade->getClientOriginalExtension();
            $trade->move($destinationPath, $tradefile);
            $input['trade_licence'] = "$tradefile";
        }else{
            unset($input['trade_licence']);
        }
// end trade licence
// start tin certificate
        if ( $tin=$request->file('tin_certificate')) {
            if($user->tin_certificate != null){
            unlink("file/users/tin_certificate/".$user->tin_certificate);
            }
            $destinationPath = 'file/users/tin_certificate';
            $tinfile = date('YmdHis') . "." . $tin->getClientOriginalExtension();
            $tin->move($destinationPath, $tinfile);
            $input['tin_certificate'] = "$tinfile";
        }else{
            unset($input['tin_certificate']);
        }
// end tin certificate

// start vat certificate

        if (  $vat = $request->file('vat_certificate')) {
            if($user->vat_certificate != null){
            unlink("file/users/vat_certificate/".$user->vat_certificate);
            }
            $destinationPath = 'file/users/vat_certificate';
            $tinfile = date('YmdHis') . "." . $vat->getClientOriginalExtension();
            $vat->move($destinationPath, $tinfile);
            $input['vat_certificate'] = "$tinfile";
        }else{
            unset($input['vat_certificate']);
        }
// end vat certificate
// start certificate of incorporation
        if (  $ci = $request->file('ci')) {
            if($user->ci != null){
            unlink("file/users/certificate_incorporation/".$user->ci);
            }
            $destinationPath = 'file/users/certificate_incorporation';
            $tinfile = date('YmdHis') . "." . $ci->getClientOriginalExtension();
            $ci->move($destinationPath, $tinfile);
            $input['ci'] = "$tinfile";
        }else{
            unset($input['ci']);
        }
// end certificate of incorporation

        // $user = User::find($id);
        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    
        $user->assignRole($request->input('roles'));
    if($role_name=="Vendor"){
        return redirect()->route('users.profile')
        ->with('success','User updated successfully');
    }else{
        return redirect()->route('users.index')
        ->with('success','User updated successfully');
    }
      
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);

        if($user->trade_licence != null){
            unlink("file/users/trade_licence/".$user->trade_licence);
        }

        if($user->tin_certificate != null){
            unlink("file/users/tin_certificate/".$user->tin_certificate);
        }
        if($user->vat_certificate != null){
            unlink("file/users/vat_certificate/".$user->vat_certificate);
        }
        if($user->ci != null){
            unlink("file/users/certificate_incorporation/".$user->ci);
        }

        $user->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }





    public function profile(Request $request)
    {
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
       
       
    //    $user=User::find(Auth::user()->id)->count();
      

    $role_name = null;
    foreach($role as $item)
    {
        $role_name =$item->name;
    }


        $user = User::find(Auth::user()->id);
        $count = User::find(Auth::user()->id)->toArray();
// dd($user);
// dd(count($count));
        $max=count($count);
        // dd(count(array_filter($count))+1);


        $now=count(array_filter($count))+1;


        return view('users.profile',compact('user','role_name','max','now'));
    }


}