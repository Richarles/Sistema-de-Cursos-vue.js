import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';

import Login from './components/Login.vue';
import RegisterLogin from './components/RegisterLogin.vue';

import RegisterStudent from './components/student/RegisterStudent.vue';
import ListStudent from './components/student/ListStudent.vue';
import EditStudent from './components/student/EditStudent.vue';

import RegisterTeacher from './components/teacher/RegisterTeacher.vue';
import ListTeacher from './components/teacher/ListTeacher.vue';

import RegisterCurse from './components/curse/RegisterCurse.vue';
import ListCurse from './components/curse/ListCurse.vue';
import SubMenu from './components/SubMenu.vue';
import Guard from './Services/middleware.js';

const router = createRouter({
    history: createWebHistory(),
    routes: [
         { path: '/formulario', component: RegisterLogin },
         {  component: Login },
         {  component: SubMenu },
         { path: '/api/estudantes/create', component: RegisterStudent },
         { name: 'students',path: '/api/estudantes', component: ListStudent },
         { name:'edit',path: '/api/edit/:id', component: EditStudent },
         { path: '/api/professor/create', component: RegisterTeacher },
         { path: '/api/professor/lista', component: ListTeacher },
         { path: '/api/curso/create', component: RegisterCurse, beforeEnter:Guard.auth },
         { path: '/api/curso/lista', component: ListCurse, beforeEnter:Guard.auth },//beforeEnter:Guard.auth autemtificação da rota
    ]
});
 const app = createApp(App);
 app.use(router);
app.mount('#app');