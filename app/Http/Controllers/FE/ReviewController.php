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

        // return response()->json($review);
        $this->showReview($review);
    }

    public function update(Request $request, Review $review)
    {
        $user_id = Auth::id(); 
        $review->update([
            'user_id' => $user_id,
            'product_id' => $request->product_id,

            'content' => $request->content,
            'rating' => $request->rating
        ]);
        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $review = Review::find($review->id);
        $review->delete();
        return response()->json($review);
    }

    public function showReview(Review $review)
    {
        $item = '';
        $item = '
        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="review_id_' . $review->id . '">';
        $item .= '<div id="comment-20" class="comment_container">';
        $item .= '<img class="profile-user-img img-fluid img-circle" src="' . $review->user->profile['avatar'] . '" alt="User profile picture" height="80" width="80">';

        $item .= '<div class="comment-text">';
        $item .= '<div class="rating">';

        for ($i = 1; $i <= 5; $i++) {
            $color = ($i <= $review->rating) ? "color: #ffcc00;" : "color: #ccc;";

            $item .= '<i class="fa fa-star" aria-hidden="true" style="cursor:pointer; ' . $color . ' font-size:30px;"></i>';
        }

        $item .= '</div>';
        $item .= '<p class="meta">';
        $item .= '<strong class="woocommerce-review__author">' . $review->user->name . '</strong>';
        $item .= '<span>–</span>';
        $item .= '<time class="woocommerce-review__published-date">';
        $item .=  Carbon::createFromFormat('Y-m-d H:i:s', $review->updated_at)->diffForHumans();
        $item .= '</time>';
        $item .= '</p>';
        $item .= '<div class="description">';
        $item .= '<p>{{$review->content}}</p>';
        $item .= '</div>';
        $item .= '</div>';
        $item .= '</div>';
        $item .= '</li>';

        echo $item;
    }
}
