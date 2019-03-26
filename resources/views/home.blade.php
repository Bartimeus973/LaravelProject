@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Espace utilisateur</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    {!! Form::open(['route' => 'formRoute', 'files' => true]) !!}
    
                        Adresse e-mail : 
                        {!! Form::email('email') !!}<br><br>
                        Image à associer : 
                        {!! Form::file('img') !!}<br><br>
                        {!! Form::submit('envoyer') !!}

                    {!! Form::close() !!}

                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
