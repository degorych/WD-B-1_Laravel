@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif

                <p>Name: {{ $showForm->name }}</p>
                <p>Surname: {{ $showForm->surname }}</p>
                <p>Birth day: {{ $showForm->burn }}</p>
                <p>Phone: {{ $showForm->phone }}</p>
                <p>Gender: {{ $showForm->gender }}</p>

                <a href="{{ route('form.edit', ['id' => $showForm->id]) }}" class="btn btn-info">Edit</a>

                {{ Form::open(['route' => ['form.destroy', $showForm->id]]) }}
                    @method('DELETE')
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection