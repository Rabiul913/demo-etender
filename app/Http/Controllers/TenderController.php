<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Tender;
use App\Models\Proposal;
use Carbon;
use Auth;
use DB;

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
        $proposals = Proposal::select("*")
            ->where("proposals.user_id",Auth::user()->id)
            ->get();
        //dd($proposals);
         $role_name = null;
        foreach($role as $item)
        {
            $role_name =$item->name;
        }

        $tenders = Tender::latest()->paginate(5);
        // foreach( $tenders as $tender)
        // {
        //     dd($tender->Proposal);
        // }

        return view('tenders.index',compact('tenders','role_name','proposals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('tenders.create');
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
            "file" => "required|mimes:pdf|max:2048"
        ]);

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
                        ->with('success','Tender created successfully.')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {
        // dd($tender);
        return view('tenders.edit',compact('tender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
