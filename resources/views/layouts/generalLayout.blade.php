@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ isset($pageCategories) ? 'active' : '' }}" aria-current="page" href="{{ route('tessi.web.category.list') }}">
                            Modulo Categorías
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ isset($pageItems) ? 'active' : '' }}" aria-current="page" href="{{ route('tessi.web.items.list') }}">
                            Modulo Artículos
                        </a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" method="POST" action="{{route('logout')}}">
                <button type="submit" class="btn btn-secondary">Cerrar sesión</button>
                {{csrf_field()}}
            </form>
        </div>
    </nav>

    <!-- Contenido de paginas -->
    <div class="main-container">
        @yield('page_content')
    </div>
@endsection

@section('page_styles')
    <style>
        .main-container {
            margin-top: 15px;
        }
    </style>
@endsection
