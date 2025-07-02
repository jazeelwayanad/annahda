<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.blog.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
            'country' => 'required',
            'country_code' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        
        try{
            // dd($request->all());

            $user = Auth::user();

            DB::beginTransaction();
            $user->addresses()->create([
                'user_id' => $user->id,
                'name' => $request->name,
                'country' => $request->country,
                'phone_number' => $request->country_code . $request->phone_number,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
            ]);
            DB::commit();

            return redirect()->back()->with('success', 'Address added successfully');
        }catch(\Exception $error){
            DB::rollBack();
            return redirect()->back()->with('error', $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
