<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404, 'Question Bulunamadı');
        return view('admin.question.index', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz=Quiz::find($id);
        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request, $id, Quiz $quiz)
    {
        $question = new Question;
        if ($request->hasFile('image')) {
            $question->image = $request->image->store('image', 'public');
        }

        Quiz::find($id)->questions()->create($request->all());

        return redirect()->route('questions.index',$id)->with('success', 'Soru Ve Cevaplar Başarılı Bir Şekilde Oluşturulmuştur');
       
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
    public function edit($question_id,$quiz_id)
    {
        $question =Quiz::find($quiz_id)->questions()->whereId($question_id)->first();
        return view('admin.question.edit',[
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $quiz_id, $question_id)
    {
        $question =Question::all();
        if ($request->hasFile('image')) {
            $question->image = $request->image->store('image', 'public');
        }

      $id =  Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());
      
        return redirect()->route('questions.index',[$quiz_id])->with('success','Soru ve Cevaplar Başarılı bir şekilde Düzenlenmiştir');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id,$id)
    {
        Quiz::find($id)->questions()->whereId($question_id)->delete();
        return redirect()->back()->with('success','Veri Başarılı Bir Şekilde Silinmiştir');
    }
}
