<x-app-layout>
    <x-slot name="title">{{ __('Question Oluştur') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Question Oluştur') }}
        </h2>
    </x-slot>
    <div class="card my-5">
        <div class="card-body">
            <form  method="POST" action="{{ route('questions.store',$quiz->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>{{__('Soru')}}</label>
                    <textarea type="longtext" name="question" class="form-control" value="{{old('question')}}" 
                    placeholder="{{__('Soru giriniz')}}" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>{{__('Resim')}}</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('1. Cevap')}}</label>
                            <textarea type="longtext" name="answer1" class="form-control" value="{{old('answer1')}}" 
                            placeholder="{{__('1. Cevabı giriniz')}}" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label>{{__('2. Cevap')}}</label>
                             <textarea type="longtext" name="answer2" class="form-control" value="{{old('answer2')}}" 
                             placeholder="{{__('2. Cevabı giriniz')}}" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('3. Cevap')}}</label>
                            <textarea type="longtext" name="answer3" class="form-control" value="{{old('answer3')}}" 
                            placeholder="{{__('3. Cevabı giriniz')}}" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('4. Cevap')}}</label>
                            <textarea type="longtext" name="answer4" class="form-control" value="{{old('answer4')}}" 
                            placeholder="{{__('4. Cevabı giriniz')}}" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{__('Doğru Cevap')}}</label>
                    <select type="longtext" name="correct_answer" class="form-control" value="{{old('correct_answer')}}">
                        <option @if(old('correct_answer')==='answer1') checked @endif value="answer1">1. Cevap</option>
                        <option @if(old('correct_answer')==='answer2') checked @endif value="answer1">2. Cevap</option>
                        <option @if(old('correct_answer')==='answer3') checked @endif value="answer1">3. Cevap</option>
                        <option @if(old('correct_answer')==='answer4') checked @endif value="answer1">4. Cevap</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success bt-sm btn-block">{{__('Oluştur')}}</label>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){

                    $('#finishedinput').show();
                }else{

                    $('#finishedinput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>