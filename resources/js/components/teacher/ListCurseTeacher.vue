<template>
<div class="contact-section ">
    <router-link to="/api/curso/add" class="nav-link"><button class="btn btn-primary rounded-pill px-3"  type="button">Adicionar Curso</button></router-link>
</div>
</template>

<script>
    export default {
        created() {
            axios
                .get('http://127.0.0.1:8000/api/user/curse')
                .then(response => {
                    console.log(response.data)
                    //this.users = response.data;
                });
        },
        mounted() {
            console.log('Component mounted.')
            axios
                .get('http://127.0.0.1:8000/api/user/curse')
                .then(response => {
                    console.log(response)
                    //this.users = response.data;
                });
        }
    }
</script>
