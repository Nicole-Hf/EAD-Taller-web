@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Información</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-text">
                                <a href="#" class="d-flex">
                                    <img src="{{ asset('/img/faces/avatar.jpg') }}" class="card-img-top" style="width:60px">
                                    <h2 class="card-title mx-3">{{ $infante->nombre }}</h2>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <div class="author">
                                    <p class="card-text ">
                                        <label for="nombre" class="col-form-label">Nombres: </label>
                                        {{ $infante->nombre }} <br>
                                        <label for="apellidoPaterno" class="col-form-label">Apellidos: </label>
                                        {{ $infante->apellidoPaterno }}
                                        {{ $infante->apellidoMaterno }} <br>
                                        <label for="edad" class="col-form-label">Edad: </label>
                                        {{ $infante->edad }} <br>
                                        <label for="sexo" class="col-form-label">Sexo: </label>
                                        {{ $infante->sexo }} <br>
                                        <label for="fechaNacimiento" class="col-form-label">Fecha de Nacimiento: </label>
                                        {{ $infante->fechaNacimiento }} <br>
                                        <label for="sala" class="col-form-label">Sala: </label>
                                        {{ $infante->sala }} <br>
                                        <label for="nombreMadre" class="col-form-label">Nombre de la madre: </label>
                                        {{ $infante->nombreMadre }} <br>
                                        <label for="nombrePadre" class="col-form-label">Nombre del padre: </label>
                                        {{ $infante->nombrePadre }} <br>
                                        <label for="telefonoEmergencia" class="col-form-label">Telefono de Emergencia: </label>
                                        {{ $infante->telefonoEmergencia }} <br>
                                    </p>
                                </div>
                            </p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="{{ route('infantes.index')}}" class="btn btn-warning">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
