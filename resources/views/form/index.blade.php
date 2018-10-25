@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Forms list</p>

                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif

                <ul class="list-group">
                    @foreach ($forms as $form)
                        <li class="list-group-item"><a href="{{ route('form.show', ['id' => $form->id]) }}">Author name: {{ $form->name }}</a></li>
                    @endforeach
                </ul>

                {{ $forms->links() }}
            </div>
        </div>
    </div>
@endsection