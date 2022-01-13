@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$nama_tombol}} Data</div>

                <div class="card-body">
                    {!! Form::model($objek, ['action' => $action,'method' =>$method]) !!}
                    <div class="form-group">
                        <label for="name">Nama</label>
                        {!! Form::text('name',null, ['class' => 'form-control']) !!}
                        <span class="text-helper">{{$errors->first('name') }}</span>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::email('email',null, ['class' => 'form-control']) !!}
                        <span class="text-helper">{{$errors->first('email') }}</span>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password' ,['class' => 'form-control']) !!}
                        <span class="text-helper">{{$errors->first('password') }}</span>

                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        {!! Form::password('password_confirmation' ,['class' => 'form-control']) !!}
                        <span class="text-helper">{{$errors->first('password_confirmation') }}</span>

                    </div>
                    {!! Form::submit($nama_tombol, ['class' => 'btn btn-primary'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
