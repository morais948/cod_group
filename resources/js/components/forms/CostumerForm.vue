<template>
    <form :action="route" method="method" class="p-5">
        <input type="hidden" name="_token" :value="csrf">
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Nome">
            </div>
            <div class="col-6">
                <input type="text" class="form-control cpf" placeholder="CPF">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-6">
                <input type="text" class="form-control phone" placeholder="Telefone (com DDD e 9)">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Cidade">
            </div>
            <div class="col-6">
                <input type="text" class="form-control state" placeholder="Estado" @keyup="acceptLetter($event)">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Rua">
            </div>
            <div class="col-6">
                <input type="text" class="form-control number" placeholder="Número">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-2">cadastrar</button>
    </form>

</template>

<script>
$(document).ready(function(){
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.phone').mask('(00) 0 0000-0000');
    $('.number').mask('000000000');
    $('.state').mask('SS'); //apenas letras
})
//fazer requisição via cep no proximo commit ex: https://viacep.com.br/ws/59054130/json/
export default {
    name: 'CostumerForm',
    props: [
        'route',
        'method',
        'csrf'
    ],
    methods: {
        acceptLetter(event){
            let value = event.target.value.toLocaleUpperCase()
            event.target.value = value
        },
    }
}
</script>
