@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                
                <div class="card-header">Espace utilisateur</div>

                <div class="card-body">

                    <a href= {{ url('/upload') }}>Ajouter un avatar</a><br><br>

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

                    <h3>Liste des avatars : </h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Mail</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($avatars != null)
                            @foreach ( $avatars as $avatar)
                                <tr>
                                    <td><img src="{{ $url . '/' . $avatar->picture }}"/></td>
                                    <td>{{ $avatar->email }}</td>
                                    <td>
                                        <form action="{{ action('HomeController@deleteRow', $avatar->id) }}" method="POST" 
                                            onSubmit="if(!confirm('Êtes vous certain de vouloir supprimer cet avatar ?')){return false;}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="supprimer" class="btn btn-danger btn-sm">
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <div class="alert alert-danger alert-block">
                                    <strong>Aucun avatar enregistré</strong>
                                </div>
                            @endif
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
