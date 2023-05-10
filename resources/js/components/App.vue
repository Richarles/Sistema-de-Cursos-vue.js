<template>
<div>
    <nav class="navbar bg-dark navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Cursos</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><router-link to="/usuarios" class="nav-link">Usuários</router-link></li>
                    <li class="nav-item"><router-link to="/api/estudantes" class="nav-link">Cursos</router-link></li>
                </ul>
            </div>
        </div>
    </nav>
    <router-view> </router-view>
        </div>
</template>
<script>

export default {
    props: ['titulo'],
  name: 'App'
}
</script>
    SubMenu