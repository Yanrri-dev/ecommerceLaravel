@extends('connect.master')

@section('title','Registro')

@section('content')


    <div class="box box-register shadow">
        <div class="header">
            <a href="{{ url('/')}}">
                <img src="{{ url('/static/images/yanrri.png')}}" alt="logo-Yanrri-dev">
            </a>
        </div>
        <div class="inside">          
            {!! Form::open(['route' => 'register']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:', []) !!}
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre']) !!}
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('last_name', 'Apellido:', ['class' => 'mtop16']) !!}
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-user-tag"></i></i></span>
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su apellido']) !!}
                </div>
                @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electrónico:', ['class' => 'mtop16']) !!}
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-envelope-open"></i></span>
                    {!! Form::email('email',null, ['placeholder' => 'Ingrese su email', 'class' => 'form-control']) !!}
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Contraseña:', ['class' => 'mtop16']) !!}
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-key"></i></span>
                    {!! Form::password('password',['placeholder' => 'Ingrese su contraseña', 'class' => 'form-control']) !!}
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                @error('cpassword')
                    @if ($message == "Las contraseñas no coinciden")
                        <span class="text-danger">{{$message}}</span>
                    @endif
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('cpassword', 'Confirmar Contraseña:', ['class' => 'mtop16']) !!}
                <div class="input-group">
                    <span class="input-group-text"><i class="far fa-key"></i></span>
                    {!! Form::password('cpassword',['placeholder' => 'Confirme su contraseña', 'class' => 'form-control']) !!}
                </div>
                @error('cpassword')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Registrarse', ['class' => 'btn btn-primary mtop16']) !!}
            {!! Form::close() !!}
            <div class="footer mtop16">
                <a href="{{route('login')}}">¿Ya tienes una cuenta? Ingresa aquí</a>
            </div>
        </div>
    </div>


@endsection