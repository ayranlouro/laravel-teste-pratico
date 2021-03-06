@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body alert alert-warning text-center" style="margin-bottom: 0px;">
                        @if (session('status'))
                            <div class="alert alert-warning">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>{{ 'Voce está logado, ' . $usuario . '!' }}</h4>
                        {{ 'Entre em contato com o admnistrador para rever suas permissões de visualização.'}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
