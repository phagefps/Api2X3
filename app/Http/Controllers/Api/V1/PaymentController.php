<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Resources\V1\PaymentResource;
use Illuminate\Support\Str;
use App\Jobs\GetClpPerUsd;
use App\Event\PaymentCreated;

class PaymentController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/payments?client={client_id}",
    *     tags={"Payments"},
    *     summary="Shows all transactions for a client",
    *     @OA\Parameter(
    *         description="Client ID",
    *         in="path",
    *         name="client_id",
    *         required=true,
    *         @OA\Schema(type="integer"),
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Shows all payments for a client in descending order and pagination."
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Non-existent client."
    *     )
    * )
    */
    public function index(Request $request)
    {
        if (User::find($request->client)) {
            return PaymentResource::collection(User::find($request->client)->payments()->orderBy('created_at', 'desc')->paginate(5));
        } else {
            return response()->json(['error' => 'Non-existent client.'], 400);
        }
    }

    /**
    * @OA\Post(
    *     path="/api/payments",
    *     tags={"Payments"},
    *     summary="Create a new payment for a client",
    *     @OA\Parameter(
    *         description="Client ID",
    *         in="query",
    *         name="client_id",
    *         required=true,
    *         @OA\Schema(type="integer"),
    *     ),
    *     @OA\Parameter(
    *         description="Date when payment expires",
    *         in="query",
    *         name="expires_at",
    *         required=true,
    *         @OA\Schema(type="string", format="date"),
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Payment created successfully."
    *     ),
    *     @OA\Response(
    *         response=401,
    *         description="Payment was not created."
    *     )
    * )
    */
    public function store(Request $request)
    {
        // Rules for field validation when creating a payment
        $validator = \Validator::make($request->all(), [
            'client_id' => 'required|numeric',
            'expires_at' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Payment was not created.', 'messages' => $validator->messages()], 400);
        } else {
            $payment = Payment::create([
                'id' => Str::uuid(), 
                'status' => "pending", 
                'client_id' => $request->client_id, 
                'expires_at' => $request->expires_at
            ]);

            GetClpPerUsd::dispatch($payment->id);
            event(new PaymentCreated($payment->user->email));

            return response()->json(['success' => 'Payment created successfully. ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
