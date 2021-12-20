<x-app-layout>
    <x-slot name="title">{{ __('Quiz Oluştur') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Quiz Oluştur') }}
        </h2>
    </x-slot>
    <div class="card my-5">
        <div class="card-body">
            <form  method="POST" action="{{ route('quizzes.store') }}">
                @csrf
                <div class="form-group">
                    <label>{{__('Quiz Başlığı')}}</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" 
                    placeholder="{{__('Quiz Başlığını giriniz')}}">
                </div>
                <div class="form-group">
                    <label>{{__('Açıklama')}}</label>
                    <textarea type="longtext" name="description" class="form-control" value="{{old('description')}}" 
                    placeholder="{{__('Quiz Açıklamasını Giriniz')}}" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" @if(old('finished_at')) checked @endif type="checkbox">
                    <label>{{__('Bitiş Tarihi Olacak mı?')}}</label>
                </div>
                <div id="finishedinput" @if(!old('finished_at')) style="display:none" @endif  class="form-group">
                    <label>{{__('Bitiş Tarihi')}}</label>
                    <input type="datetime-local" name="finished_at" value="{{ old('finished_at') }}" class="form-control">
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