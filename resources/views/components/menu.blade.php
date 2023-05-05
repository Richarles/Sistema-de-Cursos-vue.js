@extends('welcome')
@section('content')
<nav class="navbar bg-dark navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">Cursos</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><router-link to="/api/curso/lista" class="nav-link">Curso</router-link></li>
                <li class="nav-item"><router-link to="/api/estudantes" class="nav-link">Alunos</router-link></li>
                <li class="nav-item"><router-link to="/api/professor/lista" class="nav-link">Professor</router-link></li>
            </ul>
        </div>
    </div>
</nav>
@endsection