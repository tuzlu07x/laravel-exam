<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $quizzes=Quiz::where('status','publish')->withCount('questions')->paginate(5);
        return view('front.index',compact('quizzes'));
    }
    public function quiz_detail($slug){

        $quiz = Quiz::whereSlug($slug)->withCount('questions')->first();
        return view('front.quiz_detail', compact('quiz'));
    }

    public function quiz_join($slug){

        $quiz = Quiz::whereSlug($slug)->with('questions')->withCount('questions')->first();
        return view('front.quiz_join', compact('quiz'));
   }

   public function quiz_result($slug){

        return $slug;
   }
}
