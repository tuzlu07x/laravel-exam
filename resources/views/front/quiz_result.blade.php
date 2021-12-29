<x-front-layout>
    <x-slot name="title">{{ $quiz->title }} Sonucu</x-slot>
    <div class="card my-5">
        <div class="card-body">
            @foreach ($quiz->questions as $question)
                <div class="form-check">
                    <div align="center" class="form-check">
                        @if ($question->correct_answer == $question->my_answer->answer)
                            <i class="fas fa-check text-success"></i>
                            @else
                            <i class="fas fa-times text-danger"></i>
                        @endif
                        <strong> #{{ $loop->iteration }} </strong> {{ $question->question }} ?
                        <hr>
                    </div>
                    @if (!$question->image == null)
                        <img src="{{ asset($question->image) }}" class="img-responsive">
                    @endif
                    <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                        <label for="quiz1" class="btn btn-info">
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
        </div>
    </div>
</x-front-layout>
