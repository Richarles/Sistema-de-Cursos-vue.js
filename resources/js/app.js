
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';

import Login from './components/Login.vue';
import RegisterLogin from './components/RegisterLogin.vue';
import ListUser from './components/ListUser.vue';
import EditUser from './components/user/EditUser.vue';

import RegisterStudent from './components/student/RegisterStudent.vue';
import ListStudent from './components/student/ListStudent.vue';
import EditStudent from './components/student/EditStudent.vue';

import RegisterTeacher from './components/teacher/RegisterTeacher.vue';
import ListCurseTeacher from './components/teacher/ListCurseTeacher.vue';
import editTeacher from './components/teacher/editTeacher.vue';

import RegisterCurse from './components/curse/RegisterCurse.vue';
import ListCurse from './components/curse/ListCurse.vue';
//import RegisterCurse from './components/curse/RegisterCurse.vue';
import SubMenu from './components/SubMenu.vue';
import Guard from './Services/middleware.js';

axios.interceptors.request.use(
    config => {
        config.headers.Accept = 'application/json'

        let token = document.cookie.split(';').find(indice => {
            return indice.includes('token=')
        })

        token = token.split('=')[1]
        token = 'Bearer ' + token

        config.headers.Authorization = token
        /*'Accept':'application/json',
        'Authorization':this.token*/
        console.log('Interceptando o request com sucesso',config)

        return config
    },
    error => {
        console.log('Erro na requisição',error)

        return Promise.reject(error)
    }
)

axios.interceptors.response.use(
    response => {
        console.log('Interceptando a resposta com sucesso',response)

        return response
    },
    error => {
        console.log('Erro na resposta',error.response)

        if (error.response.status == 401 && error.response.data.message == "Token has expired") {
            console.log('Fazer uma nova requesição na rota refresh')

            axios.post('http://localhost:8000/api/refresh')
                .then(response => {
                    console.log('requisição com sucesso',response)
                    document.cookie = 'token='+response.data.token
                    console.log('console atualizado',response.data.token)
                    window.location.reload()

                })
                .catch(error => {

                })
        }

        return Promise.reject(error)
    }
)

const router = createRouter({
    history: createWebHistory(),
    routes: [
         { path: '/formulario', component: RegisterLogin },
         { name: 'users', path: '/usuarios', component: ListUser },
         { name: 'editUser', path: '/api/edit/:id', component: EditUser },
         {  component: Login },
         //{  component: SubMenu },
         //{ path: '/api/estudantes/create', component: RegisterStudent },
         ///{ name: 'students',path: '/api/estudantes', component: ListStudent },
         ///{ name:'edit',path: '/api/edit/:id', component: EditStudent },
         //{ path: '/api/professor/create', component: RegisterTeacher },
         { name: 'teachersCurses', path: '/api/user/curse', component: ListCurseTeacher },
         //{ name:'editTeacher',path: '/api/edit/:id', component: editTeacher },
         { name: 'addCurse', path: '/api/curso/add', component: RegisterCurse },
         //{ path: '/api/curso/create', component: RegisterCurse, beforeEnter:Guard.auth },
         { path: '/api/curso/lista', component: ListCurse, beforeEnter:Guard.auth },//beforeEnter:Guard.auth autemtificação da rota
    ]
});
 const app = createApp(App);
 app.use(router);
app.mount('#app');