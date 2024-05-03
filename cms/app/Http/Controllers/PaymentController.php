<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Payment::with('client', 'landingPage')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_formation = $request->input('id_formation');
        $token = hash('sha256', $id_formation . uniqid());
        $url = "wordpress/formation/{$id_formation}/{$token}";
        $payment = new Payment($request->all());
        $payment->generatedUrl = $url;
        $payment->save();
        return response()->json($payment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Payment::with('client', 'landingPage')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);
        $token = hash('sha256', $request->input('idlp') . uniqid());
        $url = "wordpress/formation/{$request->input('idlp')}/{$token}";
        $payment->generatedUrl = $url;
        $payment->save();
        return redirect()->back()->with('success', 'The URL has been successfully regenerated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Payment::destroy($id);
    }

    // public function regenerateUrl(Request $request, $id)
    // {
    //     $payment = Payment::findOrFail($id);
    //     $token = hash('sha256', $id . uniqid());
    //     $url = "wordpress/formation/$id/{$token}";
    //     $payment->generatedUrl = $url;
    //     $payment->save();
    //     return redirect()->back()->with('success', 'The URL has been successfully regenerated.');
    // }
}
