@extends('layouts.app')
@section('nav-menu')
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        [{{$surahs['id']}}] QS. {{$surahs['name_simple']}} ({{$surahs['translated_name']['name']}})
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($list_surahs as $surah)
            @if ($surah['id'] != $surahs['id'])
                <a href="{{route('surat', [$surah['id'], 0])}}" class="dropdown-item">
                    [{{$surah['id']}}] QS. {{$surahs['name_simple']}} ({{$surahs['translated_name']['name']}})
                </a>
            @endif
        @endforeach
    </div>
</li>
@endsection
@section('content')
<div class="container mt-3">
    <div class="row mb-3">
        @if ($surahs['id'] != 1)
            <div class="col">
                <a class="btn btn-secondary" href="{{route('surat', [$surahs['number'] - 1, 0])}}">
                    Sebelumnya
                </a>
            </div>
        @endif
        @if ($surahs['id'] != count($list_surahs))
            <div class="col">
                <a class="btn btn-primary float-right" href="{{route('surat', [$surahs['id'] + 1, 0])}}">
                    Selanjutnya
                </a>
            </div>
        @endif
    </div>
    <div class="card mb-3">
        <div class="card-header text-white bg-success text-center">{{ $surahs['name_arabic'] }}</div>
        <div class="card-body text-center">
            <span class="badge bg-primary">{{ $surahs['revelation_place'] }}</span>
            <h1 class="text-center">Surat {{ $surahs['name_simple'] }}</h1>
            <p class="card-text">{{ $surahs['translated_name']['name'] }}</p>
            {{-- <p class="card-text">{{ $surahs['tafsir']['id'] }}</p> --}}
        </div>
    </div>
    {{-- @foreach ($surahs['verses'] as $verse)
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
    @endforeach --}}
</div>
@endsection
