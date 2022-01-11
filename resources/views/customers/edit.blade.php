@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Atualização de dados do Cliente'),
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
        route="{{ route('clientes.update', $customers->id) }}"
        method="PUT"
        csrf="{{ csrf_token() }}"
        values="{{json_encode(array(
            'name' => $customers->name,
            'cpf' => $customers->cpf,
            'email' => $customers->email,
            'telephone' => $customers->telephone,
            'city' => $customers->city,
            'state' => $customers->state,
            'street' => $customers->street,
            'district' => $customers->district,
            'cep' => $customers->cep,
            'number' => $customers->number,
        ))}}"
        >
    </vue-costumer-form>
@endsection
