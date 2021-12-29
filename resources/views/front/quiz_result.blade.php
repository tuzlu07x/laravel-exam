<x-front-layout>
    <x-slot name="title">{{ $quiz->title }} Sonucu</x-slot>
    <div class="card my-5">
        <div class="card-body">
            <div class="alert alert-dark">
                <i class="fas fa-check text-success"> Doğru Soru</i>&#160;
                <i class="fas fa-times text-danger"> İşaretlediğin Yanlış Şık</i>&#160;
                <i class="fas fa-check text-warning"> Doğru Cevap</i>&#160;
            </div>
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
                            @if ('answer1' == $question->correct_answer)
                                <i class="fas fa-check text-warning"></i>
                                @elseif ('answer1' == $question->my_answer->answer)
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                        <label for="quiz{{ $question->id }}2" class="btn btn-info">
                            <input id="quiz2" type="radio" name="{{ $question->id }}"
                                value="answer2" required>
                            @if ('answer2' == $question->correct_answer)
                                <i class="fas fa-check text-warning"></i>
                                @elseif ('answer2' == $question->my_answer->answer)
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                            {{ $question->answer2 }}

                        </label>
                    </div>
                    <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                        <label for="quiz{{ $question->id }}3" class="btn btn-info">
                            <input id="quiz3" type="radio" name="{{ $question->id }}"
                                value="answer3" required>
                            @if ('answer3' == $question->correct_answer)
                                <i class="fas fa-check text-warning"></i>
                                @elseif ('answer3' == $question->my_answer->answer)
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="btn-group btn-group-toggle btn-group-vertical w-100" data-toggle="buttons">
                        <label for="quiz4" class="btn btn-info">
                            <input id="quiz{{ $question->id }}4" type="radio" name="{{ $question->id }}"
                                value="answer4" required>
                            @if ('answer4' == $question->correct_answer)
                                <i class="fas fa-check text-warning"></i>
                                @elseif ('answer4' == $question->my_answer->answer)
                                <i class="far fa-times-circle text-danger"></i>
                            @endif
                            {{ $question->answer4 }}
                        </label>
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-front-layout>
