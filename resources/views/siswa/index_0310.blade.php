@extends('layouts.app_0310')

@section('title', 'Siswa')

@section('content')
    <form action="/" method="GET" class="mt-4">
        <div class="input-group mb-3">
            <select class="form-control" id="inputGroupSelect01" name="filterKelas">
                <option value="" selected>Pilih Kelas</option>
                @foreach($kelas as $kel)
                    <option value="{{ $kel->id_kelas }}" {{ (request()->get('filterKelas') == $kel->id_kelas ? 'selected' : '') }}>{{ $kel->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" value="{{ request()->get('query') }}" placeholder="Ketik Pencarian" aria-label="Username" aria-describedby="basic-addon1" name="query">
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-success" type="submit">FILTER</button>
        </div>
    </form>

    <h2>TABEL SISWA</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">NIS</th>
            <th scope="col">NAMA</th>
            <th scope="col">KELAS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($siswa as $sis)
            <tr>
                <th scope="row">{{ $sis->nis }}</th>
                <td>{{ $sis->nama }}</td>
                <td>{{ $sis->kelas->kelas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
