<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes=Quiz::withCount('questions')->paginate(5) ?? abort(404, 'Question Bulunamadı');
        return view('admin.quiz.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->with('success','Quiz Başarılı Bir Şekilde Oluşturulmuştur');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz =Quiz::find($id) ?? abort(404,'Guiz Bulunamadı');
        return view('admin.quiz.edit',[
            'quiz' =>$quiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, 'Quiz Bulunamadı');
        $quiz->update($request->validated());
        
        return redirect()->route('quizzes.index')->with('success','Quiz Başarılı Bir Şekilde Güncellenmiştir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz Başarılı Bir Şekilde Silinmiştir');
    
    }
}
