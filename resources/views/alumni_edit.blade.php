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
                <div class="card-header">{{ __('Data Gas') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('alumni.update', $data['id']) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 text-md-right">Jenis</label>
                            <div class="col-md-6">
                                <input type="text" name="Jenis" value="{{ $data['Jenis'] }}" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 text-md-right">qty</label>
                            <div class="col-md-6">
                                <input type="number" name="qty" value="{{ $data['qty'] }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-md-right"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

