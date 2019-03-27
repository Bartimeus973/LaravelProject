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

                    @foreach ( $avatars as $avatar)
                    Liste des avatars:
                    <p>Email: {{ $avatar->email }}  <img src="{{ $avatar->URL }}"/>   <button a href="">Modifier l'avatar</button><button a href ="">Supprimer l'avatar</button></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
