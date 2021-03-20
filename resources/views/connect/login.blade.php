@extends('connect.master')

@section('title','Login')

@section('content')


    <div class="box box-login shadow">
        <div class="header">
            <a href="{{ url('/')}}">
                <img src="{{ url('/static/images/yanrri.png')}}" alt="logo-Yanrri-dev">
            </a>
        </div>
        <div class="inside">
            {!! Form::open(['route' => 'login']) !!}
            <label for="email" class="">Correo Electrónico:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="far fa-envelope-open"></i></span>
                {!! Form::email('email',null, ['placeholder' => 'Ingrese su email', 'class' => 'form-control']) !!}
            </div>
            <label for="password" class="mtop16">Contraseña:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="far fa-key"></i></span>
                {!! Form::password('password',['placeholder' => 'Ingrese su contraseña', 'class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Ingresar', ['class' => 'btn btn-primary mtop16']) !!}
            {!! Form::close() !!}
            <div class="footer mtop16">
                <a href="{{route('register')}}">¿No tienes una cuenta? Registrate</a>
                <a href="{{route('recover')}}">Recuperar Contraseña</a>
            </div>

            @if (Session::has('info'))
                <div class="container mtop16">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                        {{ Session::get('info') }}
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>                        
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function(){
                                $('.alert').slideUp();
                            }, 5000)
                        </script>
                    </div>
                </div>
                
            @endif
        </div>
    </div>


@endsection