@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez votre adresse e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification à été envoyé à votre adresse mail') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, merci de vérifier votre e-mail pour le lien de vérification.') }}
                    {{ __('Si vous n\'avez pas reçu cet e-mail' )}}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour en recevoir un autre') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
