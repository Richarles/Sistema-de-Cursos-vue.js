<template>
    <div class="login justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form @submit.prevent="login($event)">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " v-model="email" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" required autocomplete="current-password">  
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                                    <label class="form-check-label" for="remember">
                                        remember
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <router-link to="/formulario" class="btn btn-link">Criar Usuário</router-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Cookie from "js-cookie";
    export default{
        props: ['csrf_token'],
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login(e){
                let url = 'api/authentification'
                const payload = {
                    email : this.email,
                    password: this.password
                }
                let configuracao = {
                    method: 'post',
                    headers: {
                        'Content-Type' : 'application/json',
                        'Accept' : 'application/json'
                    },
                    body : JSON.stringify(payload)
                    // body: new URLSearchParams({
                    //     'email': this.email,
                    //     'password': this.password
                    // })
                }
                fetch(url,configuracao)
                    .then((response) => response.json())
                    .then(res => {
                        Cookie.set('_myapp_token',res.access_token)
                        console.log(res)
                          if (res.usuario.type == 1) {
                              //document.cookie = 'token='+data.token+';SameSite=Lax'
                              this.$router.push({ name: 'users' });
                          }
                        //  e.target.submit()
                    })
                
            }
        }
    }
</script>