@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>User list</p>

                @if(session()->has('message'))
                    <p class="alert alert-info">{{ session()->get('message') }}</p>
                @endif

                <ul class="list-group">
                    @foreach ($users as $user)
                        <li class="list-group-item"><a href="{{ route('userAttr', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
                    @endforeach
                </ul>

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection