@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fill form</div>
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

                        @if(session()->has('message'))
                            <p class="alert alert-info">{{ session()->get('message') }}</p>
                        @endif

                        {!! Form::open(['action' => 'FormController@userSendForm', 'role' => 'form']) !!}

                        <div class="form-group row">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['placeholder' => 'Vasya', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('surname', 'Surname', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('surname', null, ['placeholder' => 'Ivanov', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('burn', 'Date of birth', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::date('burn', date('Y-m-d'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::number('phone', null, ['placeholder' => '380661234567', 'class' => 'form-control']); !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-radio">
                                    {!! Form::label('gender', 'Man', ['class' => 'form-radio-label']) !!}
                                    {!! Form::radio('gender', 'man', true, ['class' => 'form-radio-input']); !!}
                                    {!! Form::label('gender', 'Woman', ['class' => 'form-radio-label']) !!}
                                    {!! Form::radio('gender', 'woman', false, ['class' => 'form-radio-input']); !!}
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
