<x-app-layout>
    <x-slot name="title">{{ __('Question Düzenle') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $question->question }}?
        </h2>
    </x-slot>
    <div class="card my-5">
        <div class="card-body">
            <form  method="POST" action="{{ route('questions.update',[$question->quiz_id,$question->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>{{__('Soru')}}</label>
                    <textarea type="longtext" name="question" class="form-control"rows="3">{{ $question->question }}</textarea>
                </div>
                @if ($question->image) 
                <div class="form-group">
                    <img src="{{ asset($question->image) }}" class="img-responsive" style="width:200px">
                    <label>{{__('Resim')}}</label>
                    <input type="file" name="image" class="form-control" value="{{ $question->image }}">
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('1. Cevap')}}</label>
                            <textarea type="longtext" name="answer1" class="form-control" rows="2">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label>{{__('2. Cevap')}}</label>
                             <textarea type="longtext" name="answer2" class="form-control"rows="2">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('3. Cevap')}}</label>
                            <textarea type="longtext" name="answer3" class="form-control" rows="2">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('4. Cevap')}}</label>
                            <textarea type="longtext" name="answer4" class="form-control" rows="2">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__('Doğru Cevap')}}</label>
                    <select name="correct_answer" class="form-control">
                        <option @if($question->answer1==='answer1') checked @endif value="answer1">1. Cevap</option>
                        <option @if($question->answer2==='answer2') checked @endif value="answer2">2. Cevap</option>
                        <option @if($question->answer3==='answer3') checked @endif value="answer3">3. Cevap</option>
                        <option @if($question->answer4==='answer4') checked @endif value="answer4">4. Cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success bt-sm btn-block">{{__('Düzenle')}}</label>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>