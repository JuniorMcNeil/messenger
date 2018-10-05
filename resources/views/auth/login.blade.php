@extends('layouts.app')

@section('content')
<b-container>
    <b-row>
        <b-col> </b-col>
        <b-col cols="8">
        <b-card title="Inicio de Sesion" class="my-3">
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
            <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

               <b-form-group 
                    label="Correo Electronico:"
                    label-for="email"
                    description="Nunca compartiremos tu correo">
               <b-form-input type="email" id="email"
                      name="email"
                      required
                      value="{{ old('email')}}" required autofocus
                      placeholder="example@gmail.com">
               </b-form-input>
               <b-form-group
                    label="Password:"
                    label-for="password">
               <b-form-input type="password" id="password"
                      name="password"
                      required
                      value="{{ old('password')}}" required>
               </b-form-input>
               <b-form-group>
               <b-form-checkbox id="remember"
                      name="remember"
                      {{ old('remember') ? 'checked="true"' : ''}}>
               </b-form-checkbox>
               </b-form-group>
               <b-button type="submit" variant="primary">
                  Ingresar
               </b-button>
               <b-button href="{{ route('password.request') }}" variant="link">
                  Olvidaste tu Password?
               </b-button>
                    </form>
        </b-card>
        </b-col>
        <b-col> </b-col>
    </b-row>
</b-container>
@endsection
