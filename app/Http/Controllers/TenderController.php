<?php

    
namespace App\Http\Controllers;
    
use App\Models\Tender;
use App\Models\Tender_type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Spatie\Permission\Models\Role;
use App\Models\Proposal;
use Carbon\Carbon;
use Timezone;
class TenderController extends Controller
{
        /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:tender-list|tender-create|tender-edit|tender-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tender-create', ['only' => ['create','store']]);
         $this->middleware('permission:tender-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tender-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $user=User::find(Auth::user()->id);
        // dd($user);
        // dd($user);
        //dd($role_name);
        
//         $date = Carbon::now();
//         dd($date);
// $x=Timezone::convertTolocal($date);

//         dd($x);
// if($role_name=="Vendor"){
//     $tenders = Tender::latest()->where('tender_type_id',$user->type_id)->get();
//     dd($tenders);
// }else{
    $tenders = Tender::latest()->paginate(5);
// }
    //   dd($tenders->Proposal);
//     foreach($tenders as $tender){
// dd($tender->Proposal);
//     }

        return view('tenders.index',compact('tenders','role_name','user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tender_types=Tender_type::latest()->get();
        return view('tenders.create',compact('tender_types'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'subject' => 'required',
            'detail' => 'required',
            'create_date' => 'required',

            'file' => 'required|mimes:pdf|max:2048',
        ]);
        if($request->publish_date !=null && $request->deadline ==null)
        {
            request()->validate([
            'deadline' => 'required',
            
        ]);
        }
        if($request->deadline !=null && $request->publish_date ==null)
        {
            request()->validate([
            'publish_date' => 'required',
            
        ]);
        }

            $input = $request->all(); 
            $input['detail']=strip_tags($request->detail);
// dd($input['detail']);
        if ($file = $request->file('file')) {
            $destinationPath = 'file/tender';
            $tenderfile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $tenderfile);
            $input['file'] = "$tenderfile";
        }
        Tender::create($input);

    
        return redirect()->route('tenders.index')
                        ->with('success','Tender created successfully.');
    }

    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tender $tender)
    {
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
   



    $role_name = null;
    foreach($role as $item)
    {
        $role_name =$item->name;
    }
        return view('tenders.show',compact('tender','role_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id

     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {
        $tender_types=Tender_type::latest()->get();
        // dd($tender);
        return view('tenders.edit',compact('tender','tender_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @param  int  $id

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tender $tender)
    {

          request()->validate([
            'subject' => 'required',
            'detail' => 'required',
            'create_date' => 'required',
            "file" => "mimes:pdf|max:5048"
        ]);

        if($request->publish_date !=null && $request->deadline ==null)
        {
            request()->validate([
            'deadline' => 'required',
            
        ]);
        }
        if($request->deadline !=null && $request->publish_date ==null)
        {
            request()->validate([
            'publish_date' => 'required',
            
        ]);
        }
    
        // dd($request);
        $input = $request->all(); 
        $input['detail']=strip_tags($request->detail);

        if ($file = $request->file('file')) {
            unlink("file/tender/".$tender->file);
            $destinationPath = 'file/tender';
            $tenderfile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $tenderfile);
            $input['file'] = "$tenderfile";
        }else{
            unset($input['file']);
        }
        // Tender::create($input);
        $tender->update($input);
        return redirect()->route('tenders.index')
                        ->with('success','Tender updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tender  $tender

        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id

     * @return \Illuminate\Http\Response
     */
    public function destroy(Tender $tender)
    {
        unlink("file/tender/".$tender->file);
        $tender->delete();
    
        return redirect()->route('tenders.index')
                        ->with('success','Tender deleted successfully');
    }

}



