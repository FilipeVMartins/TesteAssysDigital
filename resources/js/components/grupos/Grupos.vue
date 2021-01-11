<template> 
<div class="loader" >
    <div class="container col-md-12" v-if="loading === false">

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card col-md">
                    <div class="card-header">
                        Adicionar um Grupo
                    </div>

                    <div class="card-body">
                       
                        <div class="form-group ">

                            <div class="form-group col-md">
                                <div class="form-group">
                                    <label for="">Nome do Grupo</label>
                                    <input  v-model="novogrupo.nome" type="text" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                </div>
                            </div>


                            <div class="form-group col-md">
                                <div class="form-group">
                                    <label for="">Descrição</label>
                                    <textarea class="form-control"  v-model="novogrupo.descricao" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <button type="" @click="addNovoGrupo()" class="btn btn-primary btn-sm"  name="" value="">Enviar</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card list-group-item" v-if="novapessoa.grupo_id">
                    <div>
                        <div class="card-header row align-items-center justify-content-between">
                            <div class=" row col-md-5 mx-0 px-0 my-0 py-0">
                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Nome do Novo Participante</label>

                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                    <input v-model="novapessoa.nome"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                    
                                </div>
                            </div>

                            <div class=" row col-md-3 mx-0 px-0 my-0 py-0">
                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">CPF</label>

                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                    <input v-model="novapessoa.cpf"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                    
                                </div>
                            </div>
                            <div class=" row col-md-3 mx-0 px-0 my-0 py-0">
                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Nacionalidade</label>

                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                    <input v-model="novapessoa.nacionalidade"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                    
                                </div>
                            </div>

                            <div class=" row col-md-1 mx-0 px-0 my-0 py-0">
                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">UF</label>

                                <div class="col-md mx-0 px-0 my-0 py-0">
                                    <select v-model="novapessoa.uf" class="form-control" id="" name="" value="" autocomplete="" autofocus>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="card-body">

                            <div class="row align-items-center justify-content-between">
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">CEP</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.cep"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Cidade</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.cidade"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Bairro</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.bairro"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Logradouro</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.logradouro"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class=" row col-md-2 mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Número</label>

                                    <div class="col-md mx-0 px-0 my-0 py-0">
                                        <input v-model="novapessoa.numero"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="row align-items-center justify-content-between py-3">
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Complemento</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.complemento"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Data de Nascimento</span>
                                    </div>
                                    <input v-model="novapessoa.data_nascimento" id="dt1inif30" name="dt1inif30" placeholder="DD/MM/AAAA" type="date" class="form-control" value="" autocomplete="" autofocus>
                                </div>
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">telefone</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.telefone"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">telefone2</label>

                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                        <input v-model="novapessoa.telefone2"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                        
                                    </div>
                                </div>
                                <input v-model="novapessoa.grupo_id" type="hidden" class="form-control" name="" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="col-md input-group">
                            <button type="" @click="addNovaPessoa()" class="btn btn-primary btn-sm"  name="" value="">Enviar</button>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">O Participante será enviado ao grupo de nome '{{novapessoa.grupo_nome}}' e ID: {{novapessoa.grupo_id}}.</span>
                            </div>
                        </div>
                    </div>
                </div>






















            </div>
        </div>
        <br>



        <div class="row justify-content-center">
            <div class="col-md-3">
                <!-- Pesquisar Grupos-->
                <div class="card">
                    <div class="card-header">
                        Pesquisar Grupos
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <div class="form-group col-md">
                                <div class="form-group">
                                    <label for="">Nome do Grupo</label>
                                    <input  type="text" v-model="grupofind" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                </div>
                            </div>
                            <!--
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="">Paginação</label>
                                    <input  type="text" v-model="grupopag" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                </div>
                            </div>
                            -->
                        </div>
                        <button type="" @click="searchGrupos()" class="btn btn-primary btn-sm"  name="" value="">Pesquisar</button>
                        <button type="" @click="loadGrupos()" class="btn btn-primary btn-sm"  name="" value="">Mostrar Todos</button>
                    </div>
                </div>

                <br>
                <!-- Listar Pesquisa de Grupos-->
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="list-group">
                            

                            <!-- Um Grupo-->
                            <div v-for="(grupo, index) in grupos" :key="grupo.id">
                                <div class="card list-group-item mx-0 py-0 pb-2 px-0">
                                    <div>
                                        <div class="card-header">
                                            <div class="form-group">
                                                <label for="">Nome do Grupo</label>
                                                <input  type="text" v-model="grupo.nome" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="">Descrição do Grupo</label>
                                                <textarea class="form-control" v-model="grupo.descricao"  rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <button type="" @click="editGrupo(grupo, index)" class="btn btn-warning btn-sm"  name="" value="">Editar Grupo</button>
                                        <button type="" @click="deleteGrupo(grupo.id, index)" class="btn btn-danger btn-sm"  name="" value="">Excluir Grupo</button>
                                        <button type="" @click="loadPessoas(grupo)" class="btn btn-primary btn-sm my-1"  name="" value="">Listar Participantes do Grupo ID: {{grupo.id}}</button>
                                        
                                    </div>
                                </div>
                                <br>
                            </div>


                        </div>
                    </div>
                </div>







            </div>

            <div class="col-md">
                <div class="card" v-if="novapessoa.grupo_id">
                    <div class="card-header">
                        Pesquisar em Participantes Listados do Grupo '{{novapessoa.grupo_nome}}' ID: {{novapessoa.grupo_id}}.
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="">Nome do Participante</label>
                                    <input  type="text" v-model="pessoafind" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                </div>
                            </div>
                            <!--
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <label for="">Paginação</label>
                                    <input  type="text" v-model="pessoapag" class="form-control"  name="" value="" autocomplete="" placeholder="" autofocus>
                                </div>
                            </div>
                            -->
                        </div>
                        <button type="" @click="searchPessoas()" class="btn btn-primary btn-sm"  name="" value="">Pesquisar</button>
                        <button type="" @click="mostrartodosPessoas(novapessoa.grupo_id)" class="btn btn-primary btn-sm"  name="" value="">Mostrar Todos</button>
                    </div>
                </div>













                <br>



                <!-- Listar Pessoas por Grupo-->
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="list-group">
                            

                            <!-- Uma Pessoa-->
                            <div v-for="(pessoa, index) in pessoas" :key="pessoa.id">
                                <div class="card list-group-item">
                                    <div>
                                        <div class="card-header row align-items-center justify-content-between">
                                            <div class=" row col-md-5 mx-0 px-0 my-0 py-0">
                                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Nome do Participante</label>

                                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                    <input v-model="pessoa.nome"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                    
                                                </div>
                                            </div>

                                            <div class=" row col-md-3 mx-0 px-0 my-0 py-0">
                                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">CPF</label>

                                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                    <input v-model="pessoa.cpf"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                    
                                                </div>
                                            </div>
                                            <div class=" row col-md-3 mx-0 px-0 my-0 py-0">
                                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Nacionalidade</label>

                                                <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                    <input v-model="pessoa.nacionalidade"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                    
                                                </div>
                                            </div>

                                            <div class=" row col-md-1 mx-0 px-0 my-0 py-0">
                                                <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">UF</label>

                                                <div class="col-md mx-0 px-0 my-0 py-0">
                                                    <select v-model="pessoa.uf" class="form-control" id="" name="" value="" autocomplete="" autofocus>
                                                        <option value="AC">AC</option>
                                                        <option value="AL">AL</option>
                                                        <option value="AP">AP</option>
                                                        <option value="AM">AM</option>
                                                        <option value="BA">BA</option>
                                                        <option value="CE">CE</option>
                                                        <option value="DF">DF</option>
                                                        <option value="ES">ES</option>
                                                        <option value="GO">GO</option>
                                                        <option value="MA">MA</option>
                                                        <option value="MT">MT</option>
                                                        <option value="MS">MS</option>
                                                        <option value="MG">MG</option>
                                                        <option value="PA">PA</option>
                                                        <option value="PB">PB</option>
                                                        <option value="PR">PR</option>
                                                        <option value="PE">PE</option>
                                                        <option value="PI">PI</option>
                                                        <option value="RJ">RJ</option>
                                                        <option value="RN">RN</option>
                                                        <option value="RS">RS</option>
                                                        <option value="RO">RO</option>
                                                        <option value="RR">RR</option>
                                                        <option value="SC">SC</option>
                                                        <option value="SP">SP</option>
                                                        <option value="SE">SE</option>
                                                        <option value="TO">TO</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-body">

                                            <div class="row align-items-center justify-content-between">
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">CEP</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.cep"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Cidade</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.cidade"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Bairro</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.bairro"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Logradouro</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.logradouro"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class=" row col-md-2 mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Número</label>

                                                    <div class="col-md mx-0 px-0 my-0 py-0">
                                                        <input v-model="pessoa.numero"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row align-items-center justify-content-between py-3">
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">Complemento</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.complemento"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4 input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Data de Nascimento</span>
                                                    </div>
                                                    <input v-model="pessoa.data_nascimento" id="dt1inif30" name="dt1inif30" placeholder="DD/MM/AAAA" type="date" class="form-control" value="" autocomplete="" autofocus>
                                                </div>
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">telefone</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.telefone"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                                <div class=" row col-md mx-0 px-0 my-0 py-0">
                                                    <label for="name" class="text-md-right mx-0 mr-1 px-0 my-0 py-1">telefone2</label>

                                                    <div class="col-md mx-0 mr-3 px-0 my-0 py-0">
                                                        <input v-model="pessoa.telefone2"   type="" class="form-control" name="name" value="" required autocomplete="" autofocus>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="" @click="editPessoa(pessoa)" class="btn btn-warning btn-sm"  name="" value="">Editar Participante</button>
                                        <button type="" @click="deletePessoa(pessoa.id, index)" class="btn btn-danger btn-sm"  name="" value="">Excluir Participante</button>
                                        
                                        <small class="text-muted float-md-right" >Participante pertencente ao Grupo: '{{novapessoa.grupo_nome}}' ID: {{novapessoa.grupo_id}}.</small>
                                        
                                    </div>
                                </div>
                                <br>
                            </div>


                        </div>
                    </div>
                </div>















                
            </div>

            
















        </div>

        

        






    </div>    
</div>
</template>

<script>
    export default {
        data: function(){
            return {
                loading: true,
                grupos: [],
                pessoas: [],
                grupofind: '',
                grupopag: '',
                pessoafind: '',
                pessoapag: '',
                novogrupo: {
                    nome: '',
                    descricao: ''
                },
                novapessoa: {
                    nome: '',
                    cpf: '', 
                    cep: '',
                    uf: '',
                    cidade: '',
                    bairro: '',
                    logradouro: '',
                    numero: '',
                    complemento: '',
                    telefone: '',
                    telefone2: '',
                    nacionalidade: '',
                    data_nascimento: '',
                    grupo_id: '',
                    grupo_nome: ''
                }
            }
        },

        mounted() {
            
            this.loadGrupos();
            //vm.$forceUpdate();
            
        },

        methods: {
            scrollToTop: function(){
                window.scrollTo(0,0);
            },

            loadGrupos: function(){
                axios.get('http://testeassysdigital.work/api/grupos')
                    .then((response) => {
                        this.grupos = response.data.data;
                        this.loading = false;
                        //console.log(this.grupos)//
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },


            searchGrupos: function(){
                axios.get('http://testeassysdigital.work/api/grupos?' + 'nome=' + this.grupofind + '&qtdpaginate=' + this.grupopag)
                    .then((response) => {
                        this.grupos = response.data.data;
                        //console.log(response.data.data);//
                        //console.log(this.grupofind, this.grupopag);//
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },


            deleteGrupo: function(id, index){
                axios.delete('http://testeassysdigital.work/api/grupos', {data: {'id': id}})
                    .then((response) => {
                        //console.log(id, index)//
                        //console.log(response.data.data.msg)//
                        this.$delete(this.grupos, index)
                        alert("Grupo id: " + id + " excluído!");
                    })
                    .catch( function(error){
                        console.log(error);
                        alert("Um grupo só pode ser excluído caso não hajam pessoas nele!");
                    })
            },


            editGrupo: function(grupo, index){
                axios.put('http://testeassysdigital.work/api/grupos', {'id': grupo.id, 'nome': grupo.nome, 'descricao': grupo.descricao})
                    .then((response) => {
                        //console.log(grupo.id, index)//
                        //console.log(response.data)//

                        if (response.data.data.msg){
                            alert(response.data.data.msg);
                        } else if (response.data.data.errors){ 
                            var errors;
                            for (errors in response.data.data.errors) {
                                var error;
                                for (error in response.data.data.errors[errors]){
                                    alert(response.data.data.errors[errors][error]);
                                }
                            }
                        }
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },


            addNovoGrupo: function(){
                axios.post('http://testeassysdigital.work/api/grupos', {'nome': this.novogrupo.nome, 'descricao': this.novogrupo.descricao})
                    .then((response) => {
                        //console.log(this.novogrupo.nome, this.novogrupo.descricao)//
                        //console.log(response.data.data)//

                        if (response.data.data.msg){
                            this.grupos.push(response.data.data.novogrupo);
                            alert(response.data.data.msg);
                        } else if (response.data.data.errors){ 
                            var errors;
                            for (errors in response.data.data.errors) {
                                var error;
                                for (error in response.data.data.errors[errors]){
                                    alert(response.data.data.errors[errors][error]);
                                }
                            }
                        }
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },






            loadPessoas: function(grupo){
                axios.get('http://testeassysdigital.work/api/pessoas?' + 'grupo_id=' + grupo.id)
                    .then((response) => {
                        this.pessoas = response.data.data;
                        this.scrollToTop();
                        this.novapessoa.grupo_id = grupo.id;
                        this.novapessoa.grupo_nome = grupo.nome;
                        //console.log(response.data.data)//
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },

            mostrartodosPessoas: function(grupo_id){
                axios.get('http://testeassysdigital.work/api/pessoas?' + 'grupo_id=' + grupo_id)
                    .then((response) => {
                        this.pessoas = response.data.data;
                        //console.log(response.data.data)//
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },


            deletePessoa: function(id, index){
                axios.delete('http://testeassysdigital.work/api/pessoas', {data: {'id': id}})
                    .then((response) => {
                        //console.log(id, index)//
                        //console.log(response.data.data.msg)//
                        this.$delete(this.pessoas, index)
                        alert("Pessoa id: " + id + " excluída!");
                    })
                    .catch( function(error){
                        console.log(error);
                        alert("Houve um erro ao excluir a Pessoa");
                    })
            },


            editPessoa: function(pessoa){
                axios.put('http://testeassysdigital.work/api/pessoas', pessoa)
                    .then((response) => {
                        console.log(pessoa)//
                        console.log(response.data)//
                        //alert("Pessoa id: " + pessoa.id + " editada!");

                        if (response.data.data.msg){
                            alert(response.data.data.msg);
                        } else if (response.data.data.errors){ 
                            var errors;
                            for (errors in response.data.data.errors) {
                                var error;
                                for (error in response.data.data.errors[errors]){
                                    alert(response.data.data.errors[errors][error]);
                                }
                            }
                        }
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },

            addNovaPessoa: function(){
                axios.post('http://testeassysdigital.work/api/pessoas', this.novapessoa)
                    .then((response) => {
                        //console.log(response.data.data);//
                        if (response.data.data.msg){
                            this.pessoas.push(response.data.data.novapessoa);
                            alert(response.data.data.msg);
                        } else if (response.data.data.errors){ 
                            var errors;
                            for (errors in response.data.data.errors) {
                                var error;
                                for (error in response.data.data.errors[errors]){
                                    alert(response.data.data.errors[errors][error]);
                                }
                            }
                        }
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },


            searchPessoas: function(){
                axios.get('http://testeassysdigital.work/api/pessoas?' + 'nome=' + this.pessoafind + '&grupo_id=' + this.novapessoa.grupo_id + '&qtdpaginate=' + this.pessoapag)
                    .then((response) => {
                        this.pessoas = response.data.data;
                    })
                    .catch( function(error){
                        console.log(error);
                    })
            },



















        }
    }
</script>














