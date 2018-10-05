@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col> </b-col>
        <b-col cols="8">
        <b-card title="Registro" class="my-3">
        @if ($errors->any())
                <b-alert show variant="danger">
                    <ul class="mb-0"> 
                        @foreach ($errors->all() as $error)
                            <li> {{$error }} </li>
                        @endforeach
                    </ul>
                </b-alert>
            @else
                <b-alert show>Por Favor ingresa tus datos</b-alert>
            @endif
            <p class="card-text">  </p>
            <form  method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                <b-form-group 
                    label="Nombre:"
                    label-for="name">
               <b-form-input type="text" id="name"
                      name="name"
                      required
                      value="{{ old('name')}}" required autofocus>
               </b-form-input>
               <b-form-group 
                    label="Correo Electronico:"
                    label-for="email"
                    description="Nunca compartiremos tu correo">
               <b-form-input type="email" id="email"
                      name="email"
                      required
                      value="{{ old('email')}}" required
                      placeholder="example@gmail.com">
               </b-form-input>
               <b-form-group
                    label="Password:"
                    label-for="password">
               <b-form-input type="password" id="password"
                      name="password"
                      required>
               </b-form-input>
               <b-form-group
                    label="Confirmar Password:"
                    label-for="password-confirmation">
               <b-form-input type="password" id="password-confirmation"
                      name="password-confirmation"
                      required>
               </b-form-input>
               <b-button type="submit" variant="primary">
                  Confirmar Registro
               </b-button>
               <b-button href="{{ route('login') }}" variant="link">
                  Ya te has registrado?
               </b-button>
                    </form>
        </b-card>
        </b-col>
        <b-col> </b-col>
    </b-row>
</b-container>


@endsection
