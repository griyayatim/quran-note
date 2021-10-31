@extends('layouts.app')
@section('nav-menu')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        [{{$verses['surah']['number']}}] QS. {{$verses['surah']['name']['transliteration']['id']}} ({{$verses['surah']['name']['short']}})
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($list_surahs as $surah)
            @if ($surah['number'] != $verses['surah']['number'])
                <a href="{{route('surat', [$surah['number'], 0])}}" class="dropdown-item">
                    [{{$surah['number']}}] QS. {{$surah['name']['transliteration']['id']}} ({{$surah['name']['short']}})
                </a>
            @endif
        @endforeach
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ayat {{$verses['number']['inSurah']}}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @for ($i = 1; $i <= $verses['surah']['numberOfVerses']; $i++)
            @if ($i != $verses['number']['inSurah'])
                <a href="{{route('surat', [$verses['surah']['number'], $i])}}" class="dropdown-item">
                    Ayat {{$i}}
                </a>
            @endif
        @endfor
    </div>
</li>
@endsection
@section('content')
<div class="container mt-3">
    <div class="row mb-3">
        @if ($verses['number']['inQuran'] > 1)
            <div class="col">
                <a class="btn btn-secondary" href="{{route('surat', [$verses['surah']['number'], $verses['number']['inSurah'] - 1])}}">
                    Sebelumnya
                </a>
            </div>
        @endif
        <div class="col text-center">
            <a href="{{ route('surat', [$verses['surah']['number'], 0]) }}" class="btn btn-warning btn-lg mb-3"><< Kembali ke QS. {{ $verses['surah']['name']['transliteration']['id'] }}</a>
        </div>
        @if ($verses['number']['inQuran'] < 6236)
            <div class="col">
                <a class="btn btn-primary float-right"
                    @if ($verses['number']['inSurah'] == $verses['surah']['numberOfVerses'])
                        href="{{route('surat', [$verses['surah']['number'] + 1, 1])}}"
                    @else
                        href="{{route('surat', [$verses['surah']['number'], $verses['number']['inSurah'] + 1])}}"
                    @endif>
                    Selanjutnya
                </a>
            </div>
        @endif
    </div>
    <div class="card mb-3">
        <div class="card-header text-white bg-success text-center">QS. {{ $verses['surah']['name']['transliteration']['id'] }} [{{ $verses['surah']['number'] }}] ayat {{ $verses['number']['inSurah'] }}</div>
        <div class="card-body text-center">
            <h5 class="card-title">{{ $verses['text']['arab'] }}</h5>
            <p class="card-text">{{ $verses['translation']['id'] }}</p>
            <audio controls>
                <source src="{{ $verses['audio']['primary'] }}" type="audio/mpeg">
            </audio>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header text-white bg-success text-center">Tafsir</div>
        <div class="card-body text-center">
            <h5 class="card-title">{{ $verses['text']['arab'] }}</h5>
            <p class="card-text">{{ $verses['tafsir']['id']['short'] }}</p>
            <p class="card-text">{{ $verses['tafsir']['id']['long'] }}</p>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('surat', [$verses['surah']['number'], 0]) }}" class="btn btn-warning btn-lg mb-3"><< Kembali ke QS. {{ $verses['surah']['name']['transliteration']['id'] }}</a>
    </div>
</div>
@endsection
