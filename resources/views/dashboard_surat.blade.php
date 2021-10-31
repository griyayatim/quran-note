@extends('layouts.app')
@section('nav-menu')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        [{{$surahs['number']}}] QS. {{$surahs['name']['transliteration']['id']}} ({{$surahs['name']['short']}})
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($list_surahs as $surah)
            @if ($surah['number'] != $surahs['number'])
                <a href="{{route('surat', [$surah['number'], 0])}}" class="dropdown-item">
                    [{{$surah['number']}}] QS. {{$surah['name']['transliteration']['id']}} ({{$surah['name']['short']}})
                </a>
            @endif
        @endforeach
    </div>
</li>
@endsection
@section('content')
<div class="container mt-3">
    <div class="row mb-3">
        @if ($surahs['number'] != 1)
            <div class="col">
                <a class="btn btn-secondary" href="{{route('surat', [$surahs['number'] - 1, 0])}}">
                    Sebelumnya
                </a>
            </div>
        @endif
        @if ($surahs['number'] != count($list_surahs))
            <div class="col">
                <a class="btn btn-primary float-right" href="{{route('surat', [$surahs['number'] + 1, 0])}}">
                    Selanjutnya
                </a>
            </div>
        @endif
    </div>
    <div class="card mb-3">
        <div class="card-header text-white bg-success text-center">{{ $surahs['name']['long'] }}</div>
        <div class="card-body text-center">
            <span class="badge bg-primary">{{ $surahs['revelation']['id'] }}</span>
            <h1 class="text-center">Surat {{ $surahs['name']['transliteration']['id'] }}</h1>
            <p class="card-text">{{ $surahs['name']['translation']['id'] }}</p>
            <p class="card-text">{{ $surahs['tafsir']['id'] }}</p>
        </div>
    </div>
    @foreach ($surahs['verses'] as $verse)
        <div class="card mb-3">
            <div class="card-header text-white bg-success text-center">QS. {{ $surahs['name']['transliteration']['id'] }} [{{ $surahs['number'] }}] ayat {{ $verse['number']['inSurah'] }}</div>
            <div class="card-body text-center">
                <h5 class="card-title">{{ $verse['text']['arab'] }}</h5>
                <p class="card-text">{{ $verse['translation']['id'] }}</p>
                <audio controls class="mb-3">
                    <source src="{{ $verse['audio']['primary'] }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <p><a href="{{ route('surat', [$surahs['number'], $verse['number']['inSurah']]) }}" class="btn btn-warning">Tafsir >></a></p>
            </div>
        </div>
    @endforeach
</div>
@endsection
