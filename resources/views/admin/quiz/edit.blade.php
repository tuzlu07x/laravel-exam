<x-app-layout>
    <x-slot name="title">{{ __('Quiz Güncelle') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Quiz Güncelle') }}
        </h2>
    </x-slot>
    <div class="card my-5">
        <div class="card-body">
            <form  method="POST" action="{{ route('quizzes.update',$quiz) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>{{__('Quiz Başlığı')}}</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" 
                    placeholder="{{__('Quiz Başlığını giriniz')}}">
                </div>
                <div class="form-group">
                    <label>{{__('Açıklama')}}</label>
                    <textarea type="longtext" name="description" class="form-control" value="{{ $quiz->description }}"rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>{{__('Quiz Durumu')}}
                    <select class="form-control" name="status">
                        <option @if($quiz->questions_count < 4) disabled @endif 
                                @if($quiz->status=='publish') selected @endif 
                                value="publish">Aktif</option>
                        <option @if($quiz->status=='draft') selected @endif value="draft">Taslak</option>
                        <option @if($quiz->status=='passive') selected @endif value="passive">Pasif</option>
                    </select>
                </div>
                <div class="form-group">
                    <input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
                    <label>{{__('Bitiş Tarihi Olacak mı?')}}</label>
                </div>
                <div id="finishedinput" @if(!$quiz->finished_at) style="display:none" @endif  class="form-group">
                    <label>{{__('Bitiş Tarihi')}}</label>
                    <input type="datetime-local" name="finished_at" value="{{ $quiz->finished_at }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success bt-sm btn-block">{{__('Güncelle')}}</label>
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