@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Cadastro de Cliente'),
        'class' => 'col-lg-12'
    ])
    <vue-costumer-form
        route="{{ route('clientes.store') }}"
        method="post"
        csrf="{{ csrf_token() }}"
        >
    </vue-costumer-form>
@endsection
@push('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
@endpush
