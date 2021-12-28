<x-front-layout>
    <x-slot name="title">{{ $quiz->title }}</x-slot>
    <div class="card my-5">
        <div class="card-group">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-text">{{ $quiz->title }}</h5>
                    <p class="card-text">{{ $quiz->description }}</p>
                    @if ($quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning">Sonucumu Gör &nbsp;<i
                                class="fas fa-forward"></i></a>
                    @else
                        <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning">Quize Başla &nbsp;<i
                                class="fas fa-forward"></i></a>
                    @endif
                </div>
                @if ($quiz->finished_at)
                    <div class="card-footer text-muted">
                        <span title="{{ $quiz->finished_at }}" class="badge badge-danger badge-pill">
                            Dikkat Sınav {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }} Bitiyor
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-slot name="aside">
        <div class="card my-5">
            <ul class="list-group">
                @if ($quiz->finished_at)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Son Katılım Zamanı
                        <span title="{{ $quiz->finished_at }}" class="badge badge-warning badge-pill">
                            {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }}
                        </span>
                    </li>
                @endif
                @if ($quiz->my_result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puan:
                        <span class="badge badge-success badge-pill">{{ $quiz->my_result->point }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru-Yanlış Sayısı:
                        <span
                            class="badge badge-warning badge-pill">D:{{ $quiz->my_result->correct }}-Y:{{ $quiz->my_result->wrong }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Soru Sayısı:
                        <span class="badge badge-warning badge-pill">{{ $quiz->questions_count }}</span>
                    </li>
                @endif
                @if ($quiz->details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Katılımcı Sayısı
                        <span class="badge badge-warning badge-pill">{{ $quiz->details['join_count'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan
                        <span class="badge badge-warning badge-pill">{{ $quiz->details['average'] }}</span>
                    </li>
                @endif
            </ul>
        </div>
    </x-slot>
    <section class="py-1">
        @if (count($quiz->topTen) > 0)
            <div class="container">
                <div class="card mt-5">
                    <div class="card-body">
                        <div align="center">
                            <strong style="font-size:20px">Sınava Girip Derece Yapan Kişiler</strong> 
                        </div><br>
                        <ul class="list-group">
                            @foreach ($quiz->topTen as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="h3">{{ $loop->iteration }}.</strong>
                                    {{ $result->user->name }}
                                    <span @if ($result->point < 50) class="badge badge-warning badge-pill" @endif @if ($result->point >= 50) class="badge badge-success badge-pill" @endif>
                                        {{ $result->point }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </section>
    </x-frpnt-layout>
