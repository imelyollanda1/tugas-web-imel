@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <h2> {{$judul}}</h2>
                    <table class="table table-light">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengguna as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
