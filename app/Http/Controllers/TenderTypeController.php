<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tender_type;

class TenderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tender_types=Tender_Type::orderBy('id','DESC')->paginate(5);
        return view('tender_types.index',compact('tender_types'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tender_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        request()->validate([
            'name' => 'required',
        ]);
 
        Tender_Type::create($request->all());
    
        return redirect()->route('tender_types.index')
                        ->with('success','Tender Type created successfully.');
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
    public function edit(Tender_Type $tender_type)
    {
        return view('tender_types.edit',compact('tender_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tender_Type $tender_type)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        
        $tender_type->update($request->all());
        return redirect()->route('tender_types.index')
                        ->with('success','Tender Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Tender_Type $tender_type)
    {
        $tender_type->delete();
    
        return redirect()->route('tender_types.index')
                        ->with('success','Tender Type deleted successfully');
    }
}
