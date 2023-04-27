<template>
    <section class="signup-section" id="signup">
        <div class="container px-1 px-lg-1">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h2 class="text-white mb-5">Cadastro de Professor</h2>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Sobrenome</label>
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control " name="lastName" value="" required autocomplete="lastName" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Area</label>
                                <div class="col-md-6">
                                    <div class="input-group-append">
                                        <select class="form-select" name="selectArea" id="selectArea" aria-label="Default select example">
                                            <option value="null">-</option>
                                                <option value="" >Tecnologia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control " name="email" value="" required autocomplete="lastName" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telefone" class="col-md-4 col-form-label text-md-end">Telefone</label>
                                <div class="col-md-6">
                                    <input id="telefone" type="text" class="form-control " name="telefone" value="" required autocomplete="telefone" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control " name="password" value="" required autocomplete="password"> 
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
        }
    }
</script>
