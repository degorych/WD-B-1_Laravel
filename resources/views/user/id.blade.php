@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $showUser->name }}</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['action' => ['UserController@updateUserData', $showUser->id], 'role' => 'form']) !!}

                            <div class="form-group row">
                                {!! Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                <div class="col-md-6">
                                    {!! Form::text('name', $showUser->name, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'E-mail', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                                <div class="col-md-6">
                                    {!! Form::email('email', $showUser->email, ['class' => 'form-control']) !!}

                                </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('block', null, ($showUser->is_blocked) ? true : false, ['class' => 'form-check-input']) !!}
                                    {!! Form::label('block', 'To block user', ['class' => 'form-check-label']) !!}
                                </div>
                            </div>
                        </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection