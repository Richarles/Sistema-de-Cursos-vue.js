import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';

import Login from './components/Login.vue';
import RegisterLogin from './components/RegisterLogin.vue';

import RegisterStudent from './components/student/RegisterStudent.vue';
import ListStudent from './components/student/ListStudent.vue';

import RegisterTeacher from './components/teacher/RegisterTeacher.vue';
import ListTeacher from './components/teacher/ListTeacher.vue';

import RegisterCurse from './components/curse/RegisterCurse.vue';
import ListCurse from './components/curse/ListCurse.vue';
import Guard from './Services/middleware.js';

const router = createRouter({
    history: createWebHistory(),
    routes: [
         { path: '/formulario', component: RegisterLogin },
         { path: '/', component: Login },
         { path: '/api/estudantes/create', component: RegisterStudent },
         { path: '/api/estudantes/lista', component: ListStudent },
         { path: '/api/professor/create', component: RegisterTeacher },
         { path: '/api/professor/lista', component: ListTeacher },
         { path: '/api/curso/create', component: RegisterCurse, beforeEnter:Guard.auth },
         { path: '/api/curso/lista', component: ListCurse, beforeEnter:Guard.auth },//beforeEnter:Guard.auth autemtificação da rota
        // { path: '/products/:id/edit', component: ProductForm },
    ]
});
const app = createApp(App);
app.use(router);
app.mount('#app');