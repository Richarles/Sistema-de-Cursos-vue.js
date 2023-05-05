<template>
    <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><router-link to="/api/curso/lista" class="nav-link">Curso</router-link></li>
                    <li class="nav-item"><router-link to="/api/estudantes" class="nav-link">Alunos</router-link></li>
                    <li class="nav-item"><router-link to="/api/professor/lista" class="nav-link">Professor</router-link></li>
                </ul>
            </div>
</template>

<script>
import SubMenu from './SubMenu.vue'
    export default {
        name: 'SubMenu'
    }
</script>
