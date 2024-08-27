@extends('admin.layouts.admin')
@section('page')
    Hasil Rekomendasi
@endsection
@section('title')
    Hasil Rekomendasi Penerimaan
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Hasil Skor Pelamar
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Riwayat Pendidikan</th>
                                <th>Pengalaman</th>
                                <th>Keahlian</th>
                                <th>Prestasi</th>
                                <th>Kesesuaian</th>
                                <th>Kreativitas</th>
                                <th>Inovasi</th>
                                <th>Mental</th>
                                <th>Attitude</th>
                                <th>Komunikasi</th>
                                <th>Motivasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $users = [
                                    [
                                        'id' => 1,
                                        'name' => 'Putu Albert',
                                        '1' => '6',
                                        '2' => '6',
                                        '3' => '7',
                                        '4' => '5',
                                        '5' => '6',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '7',
                                        '9' => '5',
                                        '10' => '6',
                                        '11' => '6',
                                    ],
                                    [
                                        'id' => 2,
                                        'name' => 'Wayan Sumarda',
                                        '1' => '4',
                                        '2' => '6',
                                        '3' => '5',
                                        '4' => '6',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '7',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '5',
                                    ],
                                    [
                                        'id' => 3,
                                        'name' => 'Michael Orlando',
                                        '1' => '5',
                                        '2' => '5',
                                        '3' => '7',
                                        '4' => '5',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '6',
                                        '9' => '5',
                                        '10' => '4',
                                        '11' => '6',
                                    ],
                                    [
                                        'id' => 4,
                                        'name' => 'Nur Alisah',
                                        '1' => '7',
                                        '2' => '6',
                                        '3' => '7',
                                        '4' => '4',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '5',
                                        '9' => '5',
                                        '10' => '4',
                                        '11' => '6',
                                    ],
                                    [
                                        'id' => 5,
                                        'name' => 'Sumadi Alif',
                                        '1' => '4',
                                        '2' => '4',
                                        '3' => '5',
                                        '4' => '5',
                                        '5' => '7',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '6',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '4',
                                    ],
                                    [
                                        'id' => 6,
                                        'name' => 'Ni Kadek Santi',
                                        '1' => '6',
                                        '2' => '6',
                                        '3' => '6',
                                        '4' => '5',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '4',
                                        '9' => '5',
                                        '10' => '4',
                                        '11' => '6',
                                    ],
                                    [
                                        'id' => 7,
                                        'name' => 'Putu Denni',
                                        '1' => '6',
                                        '2' => '6',
                                        '3' => '4',
                                        '4' => '5',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '7',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '5',
                                    ],
                                    [
                                        'id' => 8,
                                        'name' => 'Ni Luh Sari',
                                        '1' => '5',
                                        '2' => '6',
                                        '3' => '5',
                                        '4' => '5',
                                        '5' => '6',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '4',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '4',
                                    ],
                                    [
                                        'id' => 9,
                                        'name' => 'Aldo Sumar',
                                        '1' => '6',
                                        '2' => '6',
                                        '3' => '5',
                                        '4' => '5',
                                        '5' => '6',
                                        '6' => '4',
                                        '7' => '5',
                                        '8' => '4',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '5',
                                    ],
                                    [
                                        'id' => 10,
                                        'name' => 'Jane Febriyanti',
                                        '1' => '5',
                                        '2' => '5',
                                        '3' => '5',
                                        '4' => '7',
                                        '5' => '4',
                                        '6' => '5',
                                        '7' => '5',
                                        '8' => '7',
                                        '9' => '5',
                                        '10' => '4',
                                        '11' => '6',
                                    ],
                                    [
                                        'id' => 11,
                                        'name' => 'Komang Sapur',
                                        '1' => '7',
                                        '2' => '5',
                                        '3' => '7',
                                        '4' => '6',
                                        '5' => '6',
                                        '6' => '6',
                                        '7' => '5',
                                        '8' => '7',
                                        '9' => '5',
                                        '10' => '5',
                                        '11' => '5',
                                    ],
                                ];
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user['id'] }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['1'] }}</td>
                                    <td>{{ $user['2'] }}</td>
                                    <td>{{ $user['3'] }}</td>
                                    <td>{{ $user['4'] }}</td>
                                    <td>{{ $user['5'] }}</td>
                                    <td>{{ $user['6'] }}</td>
                                    <td>{{ $user['7'] }}</td>
                                    <td>{{ $user['8'] }}</td>
                                    <td>{{ $user['9'] }}</td>
                                    <td>{{ $user['10'] }}</td>
                                    <td>{{ $user['11'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4" style="border-top: 2px solid #ccd6fc; padding-top: 24px;">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold text-primary">
                                    Hasil Keputusan Karyawan Baru
                                </h5>
                            </div>
                            <div class="p-4 font-weight-bold text-primary">
                                <div class="mb-4" style="display: flex; justify-content: space-between">
                                    <h5>Komang Sapur</h5>
                                    <h5>0.83745</h5>
                                </div>
                                <div class="mb-4" style="display: flex; justify-content: space-between">
                                    <h5>Putu Albert</h5>
                                    <h5>0.80477</h5>
                                </div>
                                <div style="display: flex; justify-content: space-between">
                                    <h5>Nur Alisah</h5>
                                    <h5>0.80143</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
