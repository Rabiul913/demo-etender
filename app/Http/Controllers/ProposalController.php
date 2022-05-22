<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Tender;


class ProposalController extends Controller
{

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:proposal-list|proposal-create|proposal-edit|proposal-delete', ['only' => ['index','show']]);
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
        $proposals = Proposal::latest()->paginate(5);
        // dd($proposals);
        return view('tender_proposals.index',compact('proposals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tender $tender)
    {


            // //    $tender = Tender::find($tender->id);
            //    return view('tender_proposals.create',compact('tender'));
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
            "file" => "required|mimes:pdf|max:10128"
        ]);
    

$input = $request->all(); 


        if ($file = $request->file('file')) {
            $destinationPath = 'file/tender/proposal';
            $proposalfile = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $proposalfile);
            $input['file'] = "$proposalfile";
        }
        Proposal::create($input);
    
        return redirect()->route('proposals.index')
                        ->with('success','Proposal created successfully.')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $tender = Tender::find($id);
            return view('tender_proposals.show',compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        // dd('$proposal->file');
        unlink("file/tender/proposal/".$proposal->file);
        $proposal->delete();
      

        return redirect()->route('proposals.index')
                        ->with('success','Proposal deleted successfully');
    }
}
