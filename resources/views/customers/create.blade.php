@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Cadastro de Cliente'),
        'class' => 'col-lg-12'
    ])
    <div class="row mt-2">
        <div class="col-12 d-flex">
            <a href="{{ route('clientes.index') }}" class="btn btn-dark ml-4">
                <i class="fas fa-long-arrow-alt-left fs-1"></i>
            </a>
        </div>
    </div>
    <vue-costumer-form
        route="{{ route('clientes.store') }}"
        method="POST"
        csrf="{{ csrf_token() }}"
        values="{{json_encode(array(
            'name' => old('name'),
            'cpf' => old('cpf'),
            'email' => old('email'),
            'telephone' => old('telephone'),
            'city' => old('city'),
            'state' => old('state'),
            'street' => old('street'),
            'district' => old('district'),
            'cep' => old('cep'),
            'number' => old('number'),
        ))}}"
        >
    </vue-costumer-form>
@endsection
