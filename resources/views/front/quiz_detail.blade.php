<x-front-layout>
    <x-slot name="title">{{ $quiz->title }}</x-slot>
    <div class="card my-5">
        <div class="card-group">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-text">{{ $quiz->title }}</h5>
                    <p class="card-text">{{ $quiz->description }}</p>
                    <a href="{{ route('quiz.join', $quiz->slug) }}" class="btn btn-warning">Quize Başla &nbsp;<i
                            class="fas fa-forward"></i></a>
                </div>
                <div class="card-footer text-muted">
                    <span title="{{ $quiz->finished_at }}" class="badge badge-danger badge-pill">
                        Dikkat Sınav {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : null }} Bitiyor
                    </span>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="aside">
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
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Katılımcı Sayısı
                    <span class="badge badge-warning badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ortalama Puan
                    <span class="badge badge-warning badge-pill">1</span>
                </li>
            </ul>
        </div>
    </x-slot>
    </x-frpnt-layout>
