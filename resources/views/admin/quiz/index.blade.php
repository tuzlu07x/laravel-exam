<x-app-layout>
    <x-slot name="title">{{ __('Quizler') }}</x-slot>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Quizler') }}
        </h2>
    </x-slot>
    <div class="card my-12">
        <div class="card-body">
            <a href=" {{ route('quizzes.create') }} " class="float-left btn btn-sm btn-warning">
                <i class="fas fa-plus"></i>
                <span class="d-none d-sm-inline">{{ __('Quiz Oluştur') }}</span>
            </a>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Quiz Kategorisi') }}</th>
                    <th scope="col">{{ __('Soru Sayısı') }}</th>
                    <th scope="col">{{ __('Durum') }}</th>
                    <th scope="col">{{ __('Bitiş Tarihi') }}</th>
                    <th scope="col">{{ __('İşlemler') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz )
                  <tr>
                    <th scope="row">{{ $quiz->id }}</th>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ count($quiz->questions) }}</td>
                    <td>
                        @switch($quiz->status)
                            @case('publish')
                                <span class="badge badge-success">Aktif</span>
                            @break
                            @case('passive')
                                <span class="badge badge-warning">Pasif</span>
                            @break
                            @case('draft')
                                <span class="badge badge-secondary">Taslak</span>
                            @break                                
                        @endswitch
                    </td>
                    <td>{{ $quiz->finished_at }}</td>
                    <td>
                        <a href="{{ route('questions.index',$quiz->id) }}" class="btn btn-sm btn-success"><i class="fas fa-question"></i></a>
                        <a href="{{ route('quizzes.edit',$quiz) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('quizzes.destroy',$quiz) }}" method="post" class="d-inline-block">
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
            {{ $quizzes->links() }}            
        </div>
    </div>
</x-app-layout>