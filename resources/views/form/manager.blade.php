@extends('layouts.app')

@section('content')
    Form
    @can('filling-form')
        <a class="pull-right btn btn-sm btn-primary" href="{{ route('filling-form') }}">Fill form</a>
    @endcan


    @can('form-management')
        <p>
            <a href="{{ route('form-management' }}" class="btn btn-sm btn-default"
               role="button">Manage form</a>
        </p>
    @endcan
@endsection
