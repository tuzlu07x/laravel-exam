<x-front-layout>
    <x-slot name="title">{{ $quiz->title }}</x-slot>
    <div class="card my-5">
        <div class="card-body">
            <form method="POST" action="{{ route('quiz.result',$quiz->slug) }}">
                @csrf
                @foreach ($quiz->questions as $question)
                    <div class="form-check">
                        <div align="center" class="form-check">
                            <strong> #{{ $loop->iteration }} </strong> {{ $question->question }} ?
                            <hr>
                        </div>
                        @if (!$question->image == null)
                            <img src="{{ asset($question->image) }}" class="img-responsive">
                        @endif
                        <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                            <label for="quiz{{ $question->id }}1" class="btn btn-info">
                                <input id="quiz{{ $question->id }}1" type="radio" name="{{ $question->id }}"
                                    value="answer1" required>
                                {{ $question->answer1 }}
                            </label>
                        </div>
                        <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                            <label for="quiz{{ $question->id }}2" class="btn btn-info">
                                <input id="quiz{{ $question->id }}2" type="radio" name="{{ $question->id }}"
                                    value="answer2" required>
                                {{ $question->answer2 }}
                            </label>
                        </div>
                        <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                            <label for="quiz{{ $question->id }}3" class="btn btn-info">
                                <input id="quiz{{ $question->id }}3" type="radio" name="{{ $question->id }}"
                                    value="answer3" required>
                                {{ $question->answer3 }}
                            </label>
                        </div>
                        <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                            <label for="quiz{{ $question->id }}4" class="btn btn-info">
                                <input id="quiz{{ $question->id }}4" type="radio" name="{{ $question->id }}"
                                    value="answer4" required>
                                {{ $question->answer4 }}
                            </label>
                            <hr>
                        </div>
                    </div>
                @endforeach
                <p align="right">
                    <button style="width:25%" type="submit" class="btn btn-success btn-right ">
                        <i class="fas fa-save"></i>
                        {{ __('Sınavı Bitir ') }}
                    </button>
                </p>
            </form>
        </div>
    </div>
    <x-slot name="aside">
        <div class="card my-5">
            <div class="card-body">
                <div class="card my-5">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son Katılım Zamanı
                            <span title="{{ $quiz->finished_at }}" class="badge badge-warning badge-pill">
                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge badge-warning badge-pill">{{ $quiz->questions_count }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>
</x-front-layout>
