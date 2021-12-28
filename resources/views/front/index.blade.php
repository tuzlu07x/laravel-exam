<x-front-layout>
    <x-slot name="title">{{ __('Anasayfa') }}</x-slot>
    <div class="card my-5">
        <div class="card-body">
            @foreach ($quizzes as $quiz)
                <div class="list-group">
                    <a href="{{ route('quiz.detail', $quiz->slug) }}"
                        class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><b>{{ $quiz->title }}</b></h5>
                            <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() . ' bitiyor' : null }}</small>
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
                    <div class="card text-white bg-warning mb-0" style="max-width: 40rem;">
                        <div class="card-header"><b>Merhaba   </b>{{ $user->name}}</div>
                        <div class="card-body">
                            <h5 class="card-title"><b>Kayıt Tarihi:  </b>{{ $user->email_verified_at->diffForHumans()}}</h5>
                            <p class="card-text"><b>Email Adresiniz:  </b>{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </x-slot>
</x-front-layout>
