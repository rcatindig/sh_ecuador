<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = \App\Models\ServiceProvider::all();
        return view('serviceprovider.list', compact('serviceProviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('serviceprovider.modal_create_service_provider')->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = "";
        if($request->hasfile('filename')) {
          echo "Hello";
          $file = $request->file('filename');
          $name=time().$file->getClientOriginalName();
          $file->move(public_path().'/images/service_provider/logo/', $name);
        }

        $serviceProvider = new \App\Models\ServiceProvider;
        $serviceProvider->name = $request->get('name');
        $serviceProvider->logo_url = "test";

        $serviceProvider->save();

        return redirect('serviceproviders')->with('success', 'Information has been added');
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
    public function edit($id)
    {
        $serviceProvider = \App\Models\ServiceProvider::find($id);
        return view('serviceprovider.modal_edit_service_provider', compact('serviceProvider', 'id'))->render();
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
        $serviceProvider = \App\Models\ServiceProvider::find($id);
        $serviceProvider->name = $request->get('name');

        $serviceProvider->save();

        return redirect('serviceproviders')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
