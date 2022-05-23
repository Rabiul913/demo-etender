<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::latest()->paginate(5);
        return view('buyers.index',compact('buyers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyers.create');
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
            'b_name' => 'required',
            'b_address' => 'required',
            'b_email' => 'required',
            "b_phone" => "required",
            'b_country'=>'required',
            'b_nid'=>'required',
        ]);

        Buyer::create($request->all());
        return redirect()->route('buyers.index')
                        ->with('success','Buyer created successfully.');
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
    public function edit(Buyer $buyer)
    {
        return view('buyers.edit',compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Buyer $buyer)
    {
        request()->validate([
            'b_name' => 'required',
            'b_address' => 'required',
            'b_email' => 'required',
            "b_phone" => "required",
            'b_country'=>'required',
            'b_nid'=>'required',
        ]);

        $buyer->update($request->all());
        return redirect()->route('buyers.index')
                        ->with('success','Buyer Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
    
        return redirect()->route('buyers.index')
                        ->with('success','Buyer deleted successfully');
    }
}
