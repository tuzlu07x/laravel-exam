<x-app-layout>
    <x-slot name="title">{{ __('Quizler') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
           <a href="{{route('quizzes.index')}}"> {{ $quiz->title }} </a>{{ __(' Quizine Ait Sorular') }}
        </h2>
    </x-slot>
    <div class="card my-12">
        <div class="card-body">
            <a href=" {{ route('questions.create',$quiz->id) }} " class="float-right btn btn-sm btn-warning">
                <i class="fas fa-plus"></i>
                <span class="d-none d-sm-inline">{{__('Quizlere Oluştur') }}</span>
            </a>
            <a href=" {{ route('quizzes.index') }} " class="float-left btn btn-sm btn-warning">
                <i class="fas fa-backward"></i>                
                <span class="d-none d-sm-inline">{{__('Quizlere Dön') }}</span>
            </a>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('question') }}</th>
                    <th scope="col">{{ __('Resim') }}</th>
                    <th scope="col">{{ __('1. Cevap') }}</th>
                    <th scope="col">{{ __('2. Cevap') }}</th>
                    <th scope="col">{{ __('3. Cevap') }}</th>
                    <th scope="col">{{ __('4. Cevap') }}</th>
                    <th scope="col">{{ __('Doğru Cevap') }}</th>
                    <th scope="col" style="width:150px;">{{ __('Durum') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question )
                  <tr>
                    <th scope="row">{{ $question->id }}</th>
                    <td>{{ $question->question }}</td>
                    <td>
                        @if ($question->image)  
                            <a href="{{ asset($question->image) }}" class="link">Göster</a>             
                        @endif                  
                    </td>  
                    <td>{{ $question->answer1 }}</td>
                    <td>{{ $question->answer2 }}</td>
                    <td>{{ $question->answer3 }}</td>
                    <td>{{ $question->answer4 }}</td>
                    <td>
                        @switch($question->correct_answer)
                            @case('answer1')
                                <span class="badge badge-success">1. Cevap</span>
                            @break
                            @case('answer2')
                                <span class="badge badge-success">2. Cevap</span>
                            @break 
                            @case('answer3')
                                <span class="badge badge-success">3. Cevap</span>
                            @break 
                            @case('answer4')
                                <span class="badge badge-success">4. Cevap</span>
                            @break
                        @endswitch
                    </td>
                    <td>
                        <a href="{{ route('questions.edit',[$question->id, $quiz->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('questions.destroy',[$question->id, $quiz->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                <span class="d-none d-md-inline"></span>
                            </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>  
        </div>
    </div>
</x-app-layout>