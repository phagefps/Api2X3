<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;

/**
* @OA\Info(title="API 2x3 | Enrique Marrero", version="1.0")
*
*/

class UserController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/clients",
    *     tags={"Clients"},
    *     summary="Show clients and url for payments",
    *     @OA\Response(
    *         response=200,
    *         description="Shows all clients in descending order, two urls to view payments and pagination."
    *     )
    * )
    */
    public function index()
    {
        return UserResource::collection(User::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
