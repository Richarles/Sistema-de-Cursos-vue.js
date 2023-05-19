<template>
    <section class="contact-section bg-red">
        <div class="container px-4 px-lg-5">
            <select class="form-select form-select-lg mb-3" v-model="selected" @change="searchTypeUser($event)" aria-label=".form-select-lg example">
                <option v-for="option in options" :key="option.id" v-bind:value="option.value">{{ option.text }}</option>
            </select>
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Editar</th>
                        <!-- <th scope="col">Detalhe</th> -->
                        <th scope="col">Exclusão</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <th scope="row">{{ user.id }}</th>
                        <td >{{ user.name }} {{ user.last_name }}</td>
                        <td >{{ user.email }}</td>
                        <td><router-link :to="{name: 'editUser', params: { id: user.id }}" class="btn btn-success">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                selected: '-------------',
                options: [
                    { text: 'todos', value: '0' },
                    { text: 'Alunos', value: '1' },
                    { text: 'Professores', value: '2' }
                ],
                users: []
            }
        },
        created() {
            axios
                .get('http://127.0.0.1:8000/api/user')
                .then(response => {
                    console.log(response.data)
                    this.users = response.data;
                });
        },
        methods: {
             deleteUser(id) { 
                  axios
                      .delete(`http://localhost:8000/api/user/${id}`)
                      .then(response => {
                          console.log(response);
                          let i = this.users.map(data => data.id).indexOf(id);
                          this.users.splice(i, 1)
                      });
             },
             searchTypeUser(event){
                console.log(event.target.value);
                // axios({
                //         method: "post",
                //         url: "http://127.0.0.1:8000/api/user",
                //         params: {
                //             ID: event.target.value45
                //         },
                //     });

                axios
                 .get('http://127.0.0.1:8000/api/user',{
                    params :{
                        search : event.target.value
                    }
                 })
                 .then(response => {
                     console.log(response.data)
                     this.users = response.data;
                 });

                //  axios
                //  .get(`http://127.0.0.1:8000/api/user/${event.target.value}`)
                //  .then(response => {
                //      console.log(response.data)
                //      //this.users = response.data;
                //  });
             }

        },
        mounted(){
            axios
                .get('http://127.0.0.1:8000/api/user')
                .then(response => {
                    console.log(response)
                    this.users = response.data;
                });
        }
    }
</script>
