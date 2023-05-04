<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Response\Json;

class Ad_NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $email = $request->email;
        $data = Newsletter::findOrCreate([
            'email' => $email
        ]);
        return response()->json(['success'=>'Thank you for your subscribe']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }

    public function list_send_mail()
    {
        // if (!Gate::any(['view_order', 'view_product'])) {
        //     abort(403);
        // }
        $emails = Newsletter::get();
        $coupons = Coupon::get();

        return view('admin.newsletter.send', [
            'emails' => $emails,
            'coupons' => $coupons
        ]);
    }

    // public function send_mail(Request $request)
    // {
    //     // dd($request->checkboxes);
    //     $validator = Validator::make($request->all(), [
    //         'subject' => 'required',
    //         'body' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors()->all(), 400);
    //     } else {
    //         try {
    //             $details = [
    //                 'subject' => $request->subject,
    //                 'body' => $request->body,
    //                 'checkboxes' => $request->checkboxes,
    //             ];

    //             $job = (new SendQueueEmail($details))
    //                 ->delay(now()->addSeconds(2));
    //             dispatch($job);
    //         } catch (Exception $e) {
    //             return response()->json([$e->getMessage()], 400);
    //         }
    //     }
    // }
}
