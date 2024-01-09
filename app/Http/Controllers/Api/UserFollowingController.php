<?php

namespace App\Http\Controllers\Api;

use App\Models\UserFollowing;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserFollowingRequest;
use App\Http\Requests\UpdateUserFollowingRequest;

class UserFollowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(StoreUserFollowingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFollowing $userFollowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserFollowing $userFollowing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFollowingRequest $request, UserFollowing $userFollowing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFollowing $userFollowing)
    {
        //
    }
}
