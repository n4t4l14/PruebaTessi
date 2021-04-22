@extends('layouts.generalLayout')

@section('page_content')
    <div class="container">
        <div class="alert alert-secondary" style="text-align: center" role="alert">
            Aplicativo diseñado para gestionar articulos y categorias!
            <br>
            <small>Por favor seleccione una de las opciones</small>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        // variable app contendra toda la logica del vue
        var app
            = new Vue({
            el: '#app',
            data: {
            }
        })
    </script>
@endpush
