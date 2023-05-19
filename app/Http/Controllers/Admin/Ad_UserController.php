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
     * Display a listing of account.
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
     * Display the profile page (admin).
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
        //
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
     * Remove the user-item.
     */
    public function destroy(Request $request, User $user)
    {
        //check password of admin
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $orderExist = Order::where('user_id', $user->id)->first();
        if($orderExist != null){
            return redirect()->back()->with('delete', 'Cannot delete this user! This user have exist in the order data!');
        }

        //find user by id
        $user = User::find($user->id);
        
        $user->delete();
        return redirect()->route('admin.user.index')->with('delete', 'User Deleted');
    }
}
