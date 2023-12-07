@extends('layouts.app')

@section('content')
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Pinjam') }}</div>

                <div class="card-body">
                    <a href="{{ route('pinjam.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table border="1">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Qty</th>
                            <th>Pengaturan</th>
                        </tr>
                        @php $no=0; @endphp
                        @foreach($data as $item)
                        @php $no++; @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['tgl_pinjam'] }}</td>
                                <td>{{ $item->alumni->Jenis }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>
                                    <a href="{{ route('pinjam.edit',$item['id']) }}" 
                                    class="btn btn-success">EDIT</a>
                                    <a href="{{ route('pinjam.hapus',$item['id']) }}" 
                                    onclick="return confirm('Apa anda yakin ingin menghapus data Gas {{ $item['Jenis'] }} ?')" 
                                    class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
