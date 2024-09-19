<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;
use App\Http\Requests\StorePaymentRequest;

class PaymentController extends Controller
{
    public function index()
    {
        return PaymentResource::collection(Payment::all());
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = new Payment();
        $payment->candidate_id = $request['candidate_id'];
        $payment->amount = $request['amount'];
        $payment->date = $request['date'];
        $payment->payment_method = $request['payment_method'];
        $payment->save();

        return PaymentResource::make($payment);
    }

    public function show(Candidate $candidate)
    {
        return $candidate->payments()->get(); //StatisticResource::make($candidate->statistics()->get());
    }

    public function update(UpdatePaymentRequest $request, Candidate $candidate)
    {
        $payment = $candidate->payments()->first();

        if ($payment) {
            $payment->update($request->validated());

            return response()->json([
                'data' => $payment
            ]);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }
    }

    public function destroy(Candidate $candidate)
    {
        $payment = $candidate->payments()->first();

        if ($payment) {
            $payment->delete();

            return response()->noContent();
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        
    } 
}