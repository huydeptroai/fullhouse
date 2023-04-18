<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class Ad_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.user.profile');
        // return view('admin.user.contact');
        $users = User::all();
        return view('admin.user.user-list',['users'=>$users]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $reviews = Review::where('user_id', $user->id)->get();
        $orders = Order::where('user_id', $user->id)->get();
        return view('admin.user.profile', [
            'user' => $user,
            'reviews' => $reviews,
            'orders' => $orders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        return view('admin.user.profile',compact('user')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
