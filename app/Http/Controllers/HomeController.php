<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Tender;
use App\Models\Proposal;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();

            $role_name = null;
            foreach($role as $item)
            {
                $role_name =$item->name;
            }
        
        $vendor = User::join("model_has_roles","model_has_roles.model_id","=","users.id")
        ->join("roles","model_has_roles.role_id","=","roles.id")
        ->where('roles.name','vendor')
        ->get()->count();
        // dd($vendor);
      
        // dd($tender);
        $currentTime = Carbon::now();
        // dd($currentTime);
        // $clientsToNotif = Tender::whereDate('rememberdate' , $currentTime->addDays(1))->get();



            if($role_name=="Vendor"){
                $proposal=Proposal::latest()->where('user_id',Auth::user()->id)->count();
                $tender=Tender::latest()->whereNotNull('publish_date')->count();
                $shortlist=0;

            }else{
                $proposal=Proposal::latest()->count();
                $shortlist=Proposal::latest()->where('status',1)->count();
                $tender=Tender::latest()->count();
            }

     


        // dd($proposal);
  
        // $users = User::latest()->count();
        // dd($tender);
        return view('home',compact('vendor','proposal','shortlist','tender','role_name'));
    }
}
