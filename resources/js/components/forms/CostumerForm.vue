<template>
    <form :action="route" method="post" class="p-5">
        <input type="hidden" name="_method" :value="method">
        <input type="hidden" name="_token" :value="csrf">
        <div class="row">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" placeholder="Nome (obrigatório)" name="name" id="nameId">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control cpf" placeholder="CPF (obrigatório)" name="cpf" id="cpf">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="email" class="form-control" placeholder="Email (obrigatório)" name="email" id="email">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control phone" placeholder="Telefone (com DDD e 9. Obrigatório)" id="telephone" name="telephone">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" id="city" placeholder="Cidade (obrigatório)" name="city">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control state" id="state" placeholder="Estado (obrigatório)" @keyup="acceptLetter($event)" name="state">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" class="form-control" id="street" placeholder="Rua (obrigatório)" name="street">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control" id="district" placeholder="Bairro (obrigatório)" name="district">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-6">
                <input type="text" @keyup="requestCEP($event)" id="cep" class="form-control cep" placeholder="CEP(coloque o CEP e pegaremos seu endereço automaticamente. Obrigatório)" name="cep">
            </div>
            <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                <input type="text" class="form-control number" id="number" placeholder="Número (obrigatório)" name="number">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-2">{{ method != 'PUT' ? 'cadastrar' : 'atualizar' }}</button>
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
        'csrf',
        'values'
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
                        city.value = res.data.localidade != undefined ? res.data.localidade : ''
                        street.value = res.data.logradouro != undefined ? res.data.logradouro : ''
                        state.value = res.data.uf != undefined ? res.data.uf : ''
                        district.value = res.data.bairro != undefined ? res.data.bairro : ''
                    })
            }
        }
    },
    mounted(){
        console.log(JSON.parse(this.values))
        let values = JSON.parse(this.values)

        nameId.value = values.name
        cpf.value = values.cpf
        email.value = values.email
        telephone.value = values.telephone
        city.value = values.city
        state.value = values.state
        street.value = values.street
        district.value = values.district
        cep.value = values.cep
        number.value = values.number
    }
}
</script>
