<template>
    <section class="signup-section" id="signup">
        <div class="container px-1 px-lg-1">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h2 class="text-white mb-5">Cadastrar Curso</h2>
                    <div class="card-body">
                        <form @submit.prevent="save">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Nome do Curso</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="curse.name" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Preço</label>
                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" v-model="curse.price" required autocomplete="price" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-end">Area</label>
                                <div class="col-md-6">
                                    <div class="input-group-append">
                                        <select class="form-select" v-model="curse.field" id="selectArea" aria-label="Default select example">
                                            <option v-for="option in options" :key="option.id" v-bind:value="option.value">{{ option.text }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">description</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" v-model="curse.description" required autocomplete="description" autofocus>
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
        data() {
            return {
                user: {}
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/user/${this.$route.params.id}`)
                .then((res) => {
                    console.log(res);
                    this.user = res.data;
                });
        },
        methods: {
            updateUser() {
                axios
                    .patch(`http://localhost:8000/api/user/${this.$route.params.id}`, this.user)
                    .then((res) => {
                        this.$router.push({ name: 'users' });
                    });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
