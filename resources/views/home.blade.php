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

                    {!! Form::open(['route' => 'formRoute']) !!}
    
                        {!! Form::file('img') !!}
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
