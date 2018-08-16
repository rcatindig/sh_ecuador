<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Helpers\Common;

class PrepaidCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $serviceProviders = \App\Models\ServiceProvider::all();
      $prepaidCards = \App\Models\PrepaidCard::all();
      return view('prepaidcard.prepaid_cards', compact('prepaidCards','serviceProviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceProviders = \App\Models\ServiceProvider::all();
        return view('prepaidcard.modal_create_prepaid_card', ['serviceProviders' => $serviceProviders])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $prepaidCard = new \App\Models\PrepaidCard;
      $prepaidCard->voucher_code = $request->get('voucher_code');
      $prepaidCard->password = Hash::make($request->password);
      $prepaidCard->expiry_date = $request->get('expiry_date');
      $prepaidCard->value = $request->get('value');
      $prepaidCard->service_provider_id = $request->get('service_provider_id');
      $prepaidCard->redemption_status = $request->get('redemption_status');

      $prepaidCard->save();

      return redirect('prepaidcards')->with('success', 'Information has been added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
      $quantity           = $request->get('quantity');
      $serviceProviderId  = $request->get('service_provider_id');
      $shelflife          = $request->get('shelflife');
      $currency           = $request->get('currency');
      $denomination       = $request->get('denomination');

      $batch                = new \App\Models\Batch;
      $batch->quantity      = $quantity;
      $batch->denomination  = $denomination;
      $batch->currency      = $currency;
      $batch->shelflife     = $shelflife;

      if($batch->save()) {
        $batchId = $batch->id;
        for($i=0; $i<$quantity; $i++) {
          $prepaidCard = new \App\Models\PrepaidCard;
          $prepaidCard->voucher_code = Common::voucher_code_string();
          $prepaidCard->password = "";
          $prepaidCard->expiry_date = $shelflife;
          $prepaidCard->value = 0;
          $prepaidCard->service_provider_id = $serviceProviderId;
          $prepaidCard->redemption_status = "not yet redeem";
          $prepaidCard->batch_id = $batchId;

          $prepaidCard->save();
        }
        return redirect('prepaidcards')->with('success', 'Prepaid cards are generated Please see Batch-' . $batchId);
      }

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
      $prepaidCard = \App\Models\PrepaidCard::find($id);
      $serviceProviders = \App\Models\ServiceProvider::all();
      $batches = \App\Models\Batch::all();
      return view('prepaidcard.modal_edit_prepaid_card', compact('prepaidCard', 'id', 'serviceProviders', 'batches'))->render();
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
      $prepaidCard = \App\Models\PrepaidCard::find($id);
      $prepaidCard->voucher_code = $request->get('voucher_code');

      if($request->password != "") {
        $prepaidCard->password = Hash::make($request->password);
      }
      $prepaidCard->expiry_date = $request->get('expiry_date');
      $prepaidCard->value = $request->get('value');
      $prepaidCard->service_provider_id = $request->get('service_provider_id');
      $prepaidCard->redemption_status = $request->get('redemption_status');
      $prepaidCard->save();

      return redirect('prepaidcards')->with('success', 'Information has been updated');
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
