<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::first();
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('front.index', compact('quizzes', 'user'));
    }
    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('my_result', 'topTen.user')->withCount('questions')->first();
        return view('front.quiz_detail', compact('quiz'));
    }

    public function quiz_join($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions.my_answer')->withCount('questions')->first();
        if ($quiz->my_result) {
            return view('front.quiz_result', compact('quiz'));
        }
        return view('front.quiz_join', compact('quiz'));
    }

    public function quiz_result(Request $request, $slug)
    {
        $correct = 0;
        $wrong = 0;
        $quiz = Quiz::with('questions')->withCount('questions')->whereSlug($slug)->first() ?? abort('404', 'Quiz Bulunamadı');
        if ($quiz->my_result) {
            return redirect()->route('quiz.detail', $quiz->slug)->with('warning', 'Bu quize Daha önce Katıldınız');
        }
        foreach ($quiz->questions as $question) {

            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)

            ]);
            // $question->correct_answer . '--' . $request->post($question->id) . '<br>';
            if ($question->correct_answer === $request->post($question->id)) {
                $correct = $correct + 1;
            }
            $point = round((100 / count($quiz->questions)) * $correct);
            $wrong = count($quiz->questions) - ($correct);
        }
        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);
        return redirect()->route('quiz.detail', $quiz->slug)->with('success', 'Sınavınız Bitmiştir Puanınız:' . $point);
    }
}
