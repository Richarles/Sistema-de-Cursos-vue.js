<template>
    <section class="signup-section" id="signup">
        <div class="container px-1 px-lg-1">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h2 class="text-white mb-5">Formulário</h2>
                    <div class="card-body">
                        <form @submit.prevent="save">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="user.name" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Sobrenome</label>
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" v-model="user.last_name" required autocomplete="lastName" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">Estado</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" v-model="user.state" required autocomplete="city" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">Cidade</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" v-model="user.city" required autocomplete="city" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="road" class="col-md-4 col-form-label text-md-end">Rua</label>
                                <div class="col-md-6">
                                    <input id="road" type="text" class="form-control" v-model="user.road" required autocomplete="road" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district"  class="col-md-4 col-form-label text-md-end">Bairro</label>
                                <div class="col-md-6">
                                    <input id="district"  type="text" class="form-control" v-model="user.district" required autocomplete="district"  autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="number" class="col-md-4 col-form-label text-md-end">Número</label>
                                <div class="col-md-6">
                                    <input id="number" type="number" class="form-control" v-model="user.number" required autocomplete="number" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date_birth" class="col-md-4 col-form-label text-md-end">Tipo de Usuário:</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="user.type" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineCheckbox1">Aluno</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" v-model="user.type" id="inlineRadio1" value="2">
                                        <label class="form-check-label" for="inlineCheckbox1">Professor</label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row mb-3">
                                <label for="date_birth" class="col-md-4 col-form-label text-md-end">Data de Nasc.</label>
                                <div class="col-md-6">
                                    <input id="date_birth" type="date" class="form-control" v-model="user.date_birth" required autocomplete="date_birth" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telefone" class="col-md-4 col-form-label text-md-end">Telefone</label>
                                <div class="col-md-6">
                                    <input id="telefone" type="tel" class="form-control" v-model="user.fone" required autocomplete="telefone" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="user.email" required autocomplete="lastName" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="user.password" required autocomplete="password"> 
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                user: {}
            }
        },
        methods:{
            save(){
                console.log(this.student)
                
                     axios
                     .post('/api/register', this.user)
                     .then(response => (
                         console.log(response)
                     ))
                     .catch(err => console.log(err))
                     .finally(() => this.loading = false)

            }
        }
    }
</script>
