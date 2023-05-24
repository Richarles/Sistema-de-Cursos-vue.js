<template>
<div class="contact-section ">
    <router-link to="/api/curso/add" class="nav-link"><button class="btn btn-primary rounded-pill px-3"  type="button">Adicionar Curso</button></router-link>
</div>
<section class="contact-section bg-red">
        <div class="container px-4 px-lg-5">
            <div class="input-group mb-3">
                <input type="text"  @keyup="searchTypeUser" v-model="keywords" class="form-control" placeholder="Search" aria-label="Example text with button addon" aria-describedby="button-addon1">
        </div>
         <p>
                {{ keywords }}
            </p>
            <!-- <select class="form-select form-select-lg mb-3" v-model="selected" @change="searchTypeUser($event)" aria-label=".form-select-lg example">
                <option v-for="option in options" :key="option.id" v-bind:value="option.value">{{ option.text }}</option>
            </select> -->
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
                    <tr v-for="user in curseTeachers" :key="user.id">
                        <th scope="row">{{ user.id }}</th>
                        <td >{{ user.name }}</td>
                        <td >{{ user.field }}</td>
                        <td><router-link :to="{name: 'editTeachersCurses', params: { id: user.id }}" class="btn btn-success">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click="deleteCurse(user.id)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return {
                keywords: '',
                curseTeachers: []
            }
        },
        created() {
            axios
                .get('http://127.0.0.1:8000/api/curse')
                .then(response => {
                    console.log(response.data)
                    this.curseTeachers = response.data;
                });
        },
        methods:{
            queryForKeywords(event) {
       const value = event.target.value
        this.keywords = value
        console.log(value)
           //alert('you are enter some key!!');
    },
            deleteCurse(id) { 
                  axios
                      .delete(`http://localhost:8000/api/curse/${id}`)
                      .then(response => {
                          console.log(response);
                          let i = this.curseTeachers.map(data => data.id).indexOf(id);
                          this.curseTeachers.splice(i, 1)
                      });
            },
            searchTypeUser(event){
                console.log(event.target.value)

                axios
                 .get('http://127.0.0.1:8000/api/curse',{
                    params :{
                        search : event.target.value
                    }
                 })
                 .then(response => {
                     console.log(response.data)
                     this.curseTeachers = response.data;
                 });
            },
        },
        mounted() {
            console.log('Component mounted.')
            axios
                .get('http://127.0.0.1:8000/api/curse')
                .then(response => {
                    console.log(response)
                    this.curseTeachers = response.data;
                });
        }
    }
</script>
