<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);

        $user_id = Auth::id();

        $review = Review::create(
            [
                'user_id' => $user_id,
                'product_id' => $request->product_id,

                'content' => $request->content,
                'rating' => $request->rating
            ]
        );

        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return response()->json($review);
    }

}
