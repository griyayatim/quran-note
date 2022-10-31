@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="text-center">Daftar Surat</h1>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nomor</th>
            <th>Nama Surat</th>
            <th>Arti Surat</th>
            <th>Jumlah Ayat</th>
            <th>View</th>
            @foreach ($surahs as $surah)
                <tr>
                    <td>
                        {{ $surah['id'] }}
                    </td>
                    <td>
                        {{ $surah['name_arabic'] }}
                        {{ $surah['name_simple'] }}
                    </td>
                    <td>
                        {{ $surah['translated_name']['name'] }}
                    </td>
                    <td>
                        {{ $surah['verses_count'] }} ayat
                    </td>
                    <td>
                        <a href="{{ route('surat', [$surah['id'], 0]) }}">Detail</a>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
@endsection
