<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use App\Models\Tender;
use App\Models\Tender_type;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProposalController extends Controller
{

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:proposal-list|proposal-create|proposal-edit|proposal-delete|proposal-shortlist|proposal-finallist', ['only' => ['index','show']]);
         $this->middleware('permission:proposal-create', ['only' => ['create','store']]);
         $this->middleware('permission:proposal-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:proposal-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $user_id = Auth::user()->id;
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
            ->where("model_has_roles.model_id",Auth::user()->id)
            ->get();
        
        $role_name = null;
        foreach($role as $item)
        {
            $role_name =$item->name;
        }
        $proposals = Proposal::latest()->paginate(5);
        
        return view('tender_proposals.index',compact('proposals','user_id','role_name'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function shortfinallist($status_id){

        $user_id = Auth::user()->id;
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
            ->where("model_has_roles.model_id",Auth::user()->id)
            ->get();
        
        $role_name = null;
        foreach($role as $item)
        {
            $role_name =$item->name;
        }

        $proposals = Proposal::latest()->where('status',$status_id)->paginate(5);
        // dd($proposals);
            if($status_id==1){
                return view('tender_proposals.shortlist',compact('proposals','user_id','role_name'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
            }elseif($status_id==2){
                return view('tender_proposals.finallist',compact('proposals','user_id','role_name'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
            }
       
    }

   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created($id, $i=0)
    {
        // dd($i);

               $tender = Tender::find($id);
               if($i==0){
                return view('tender_proposals.create',compact('tender','i'));
               }elseif($i==1){
                return view('tender_proposals.create',compact('tender','i'));
                
               }
                   
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
            'user_id' => 'required',
            'tender_subject' => 'required',
            'delivery_date' => 'required',
            'total_amount'=> 'required',
            'status' => 'required',
            "file" => "required|mimes:pdf|max:10128"
        ]);
    

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();
    
    $role_name = null;
    foreach($role as $item)
    {
        $role_name =$item->name;
    }

$user=User::find(Auth::user()->id);
// dd($user);

//dd($request->all());
$input = $request->all(); 


        if ($file = $request->file('file')) {
            $destinationPath = 'file/tender/proposal';
            $proposalfile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $proposalfile);
            $input['file'] = "$proposalfile";
        }


        if ($bank = $request->file('bank_solvency')) {
            $destinationPath = 'file/tender/proposal/banksolvency';
            $bankfile = date('YmdHis') . "." . $bank->getClientOriginalExtension();
            $bank->move($destinationPath, $bankfile);
            $input['bank_solvency'] = "$bankfile";
        }

        if ($audit = $request->file('audit_report')) {
            $destinationPath = 'file/tender/proposal/auditreport';
            $auditfile = date('YmdHis') . "." . $audit->getClientOriginalExtension();
            $audit->move($destinationPath, $auditfile);
            $input['audit_report'] = "$auditfile";
        }

if($user->trade_licence!=null && $user->tin_certificate != null && $user->vat_certificate != null && $user->ci !=null){
    Proposal::create($input);
    return redirect()->route('proposals.index')
                    ->with('success','Proposal created successfully.');
}else{
    return $this->created($request->tender_id,$i=1);
}

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        $user=User::find($proposal->user_id);

        $tender=Tender::find($proposal->tender_id);
// dd($tender);

        $type=" ";
        $tender_type=Tender_type::latest()->get();
        foreach($tender_type as $tendertype){

            if($tender->tender_type_id == $tendertype->id){
                $type=$tendertype;
            }
           
        }
        
    
        // dd($tender_type);
        // dd($proposal);

        
        return view('tender_proposals.show',compact('proposal','user','tender','type'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        return view('tender_proposals.edit',compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        request()->validate([
            'status' => 'required',
        ]);
       // dd($request->all());
        $proposal->update($request->all());
    
        return redirect()->route('proposals.index')
                        ->with('success','Proposal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {


        if($proposal->file != null){
            unlink("file/tender/proposal/".$proposal->file);
        }
        
        if($proposal->bank_solvency != null){
            unlink("file/tender/proposal/banksolvency/".$proposal->bank_solvency);
        }
        
        if($proposal->audit_report != null){
            unlink("file/tender/proposal/auditreport/".$proposal->audit_report);
        }

        $proposal->delete();
        return redirect()->route('proposals.index')
                        ->with('success','Proposal deleted successfully');
    }
}
