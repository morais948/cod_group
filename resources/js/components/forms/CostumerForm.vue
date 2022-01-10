<template>
    <form :action="route" :method="method" class="p-5">
        <input type="hidden" name="_token" :value="csrf">
        <div class="row">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" placeholder="Nome">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control cpf" placeholder="CPF">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control phone" placeholder="Telefone (com DDD e 9)">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" id="cidade" placeholder="Cidade">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control state" id="estado" placeholder="Estado" @keyup="acceptLetter($event)">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" id="rua" placeholder="Rua">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control number" id="bairro" placeholder="Bairro">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" @keyup="requestCEP($event)" class="form-control cep" placeholder="CEP(coloque o CEP e pegaremos seu endereço automaticamente)">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
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
    $('.cep').mask('00000-000');
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
        requestCEP(event){
            let cep = event.target.value.replace('-', '')
            if(cep.length === 8){
                axios.get(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(res => {
                        cidade.value = res.data.localidade
                        rua.value = res.data.logradouro
                        estado.value = res.data.uf
                        bairro.value = res.data.bairro
                    })
            }
        }
    }
}
</script>
