<template>
    <section class="contact-section bg-red">
        <div class="container px-4 px-lg-5">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Digite aqui o professor" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
            </div>
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
                    <tr v-for="student in students" :key="student.id">
                        <th scope="row">{{ student.id }}</th>
                        <td >{{ student.name }} {{ student.last_name }}</td>
                        <td >{{ student.email }}</td>
                        <td><router-link :to="{name: 'edit', params: { id: student.id }}" class="btn btn-success">Edit</router-link></td>
                        <td><button class="btn btn-danger" @click="deleteStudent(student.id)">Delete</button></td>
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
                students: []
            }
        },
        created() {
            axios
                .get('http://127.0.0.1:8000/api/estudantes')
                .then(response => {
                    console.log(response.data)
                    this.students = response.data;
                });
        },
        methods: {
            deleteStudent(id) { 
                axios
                    .delete(`http://localhost:8000/api/estudantes/${id}`)
                    .then(response => {
                        console.log(response);
                        let i = this.students.map(data => data.id).indexOf(id);
                        this.students.splice(i, 1)
                    });
            }
        },
    }
</script>
