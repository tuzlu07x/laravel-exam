<x-front-layout>
    <x-slot name="title">{{ __('Anasayfa') }}</x-slot>
    <div class="card my-5">
        <div class="card-body">
            @foreach ($quizzes as $quiz)
            <div class="list-group">
                <a href="{{ route('quiz.detail',$quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><b>{{ $quiz->title }}</b></h5>
                    <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans().' bitiyor':null }}</small>
                  </div>
                  <p class="mb-1">{{ Str::limit($quiz->description, 100) }}</p>
                  <small>{{ $quiz->questions_count }} Soru</small>
                </a>
            </div>
            @endforeach
        </div>
        {{ $quizzes->links() }}
    </div>
    <x-slot name="aside">
        <div class="card my-5">
            <div class="card-body">
                You're logged in!
            </div>
        </div>
    </x-slot>
</x-front-layout>