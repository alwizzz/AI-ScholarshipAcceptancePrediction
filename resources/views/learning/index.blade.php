@extends('layouts.main')

@section('content')

    @include('partials.learning_navbuttons')

    <h1>Learning Dataset</h1>

    <table id="dt" class="table table-stripped table-hover ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Jarak Tempat Tinggal ke Kampus</th>
                <th scope="col">SKS</th>
                <th scope="col">Ikut Organisasi</th>
                <th scope="col">Ikut UKM</th>
                <th scope="col">IPK</th>
                <th scope="col">Pekerjaan Orang Tua</th>
                <th scope="col">Penghasilan Orang Tua</th>
                <th scope="col">Tanggungan</th>
                <th scope="col">Beasiswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->jarak_tempat_tinggal_ke_kampus }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->ikut_organisasi }}</td>
                    <td>{{ $item->ikut_ukm }}</td>
                    <td>{{ $item->ipk }}</td>
                    <td>{{ $item->pekerjaan_orang_tua }}</td>
                    <td>{{ $item->penghasilan_orang_tua }}</td>
                    <td>{{ $item->tanggungan }}</td>
                    <td>{{ ($item->beasiswa) ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-5"></div>

@endsection