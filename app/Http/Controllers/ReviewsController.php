<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Http\Requests\ReviewRequest;

class ReviewsController extends Controller
{
    public function create(ReviewRequest $request){
        $review = new Review;
        $review->menu_id = $request->menu_id;
        $review->message = $request->message;
        $review->reputation = $request->reputation;
        $review->author_name = $request->author_name;

        if($review->save()){
            return redirect("/schedule/{$review->menu_id}")->with('status', 'success-review');
        }
        else{
            return redirect("/schedule/{$review->menu_id}")->with('status', 'failed-review');
        }
    }
}
