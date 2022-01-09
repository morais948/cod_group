@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Listagem de Clientes'),
        'class' => 'col-lg-12'
    ])

    <x-table>
        @slot('titles', [
            'id', 'Nome', 'CPF',
            'Email', 'Telefone', 'CEP', 'Cidade',
            'Estado', 'Bairro', 'Rua', "N°",
        ])
        @slot('content', $customers)
        @slot('prefix', "clientes")
        @slot('config', ['edit' => true, 'remove' => true, 'add' => true])
    </x-table>
@endsection
