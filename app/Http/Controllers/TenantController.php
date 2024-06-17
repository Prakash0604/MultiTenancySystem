<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenant=Tenant::with('domains')->get();
        return view('dashboard',['tenants'=>$tenant]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tenant.CreateUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>['required',Rules\Password::default(),'confirmed'],
            'domain_name'=>'required|string|unique:domains,domain',
        ]);
        $tenants=Tenant::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $tenants->domains()->create([
            'domain'=>$request->domain_name.'.'.config('app.domain'),
        ]);
        return redirect()->route('tenants.index')->with(['message'=>'New User has been created']);
        // dd($request->toArray());
    }


    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
