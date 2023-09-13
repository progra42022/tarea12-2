@extends('my-layouts.my-app')
@section('content')
<h1>{{ __('messages.welcome') }}</h1>
    <form method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="nombre">Nombre:</label> <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}"><br/>
        <label for="email">Email:</label> <input type="text" id="email" name="email" value="{{old('email')}}"><br/>
        <input type="checkbox" id="publicidad" name="publicidad" @checked(old('publicidad'))><label for="publicidad">Recibir Publicidad</label><br/>
        <label for="mensaje">Mensaje:</label> <br/>
        <textarea id="mensaje" name="mensaje"> {{old('mensaje')}}</textarea><br/>
        <input type="submit" value="Enviar"/>
    </form>
@endsection
