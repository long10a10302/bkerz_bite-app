<?php


namespace App\Http\Controllers;




use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReviewController extends Controller
{
    public function review(){
        return view('users.review');
    }


    public function reviewed(Request $request){


        $userId = Auth::id();
        Review::create(attributes: [
            'rating' => $request->rating,
            'comment' => $request->comment,
            'user_id' => $userId
           
        ]);


        Session::flash('success', 'Cảm ơn bạn đã đánh giá!');


        return redirect()->route('user.review'); // Chuyển hướng về trang review
    }
   
}
