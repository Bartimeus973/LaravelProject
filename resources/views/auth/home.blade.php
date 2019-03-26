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

<<<<<<< HEAD:resources/views/auth/home.blade.php
                    Vous êtes connecté !
                    <br/><br/>
                    Liez des mails est des avatars!
                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email">
                        <label for="profile_image">Avatar</label>
                        <input id="profile_image" type="file" class="form-control" name="profile_image">
                        @if (auth()->user()->image)
                        <code>{{ auth()->user()->image }}</code>
                        @endif
                        <button type="submit" class="btn btn-primary">Valider</button>                
                    </form>
=======
                    {!! Form::open(['route' => 'formRoute']) !!}
    
                        {!! Form::file('img') !!}
                        {!! Form::submit('envoyer') !!}

                    {!! Form::close() !!}

                    @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
>>>>>>> julien:resources/views/home.blade.php
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
