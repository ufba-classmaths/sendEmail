@extends('layouts.mailLayouts')

@section('title', 'Convite Loved Husband')


@section('content')
    <div class="row ">
        <div class="col m12 s12 l12 ">
            <div class="container card-panel myCard">
                <img width="200" height="300"
                    src="https://pgcomp.ufba.br/sites/pgcomp.ufba.br/files/logomarca_novo_template_-_sites_da_pos-graduacao_0.png" />
                <div class="card-content center">
                    <p>Olá! Você acabou de receber um convite para ser um administrador do ICIA,
                        o assistente virtual da Universidade Federal da Bahia - UFBA</p>
                    <ul>
                        <li>passo 1:Acesse: {{ url($url) }}</li>
                        <li>passo 2: Clique em "aceitar convite" </li>
                        <li>passo 3: Copie e cole o código </li>
                        <li>passo 4: Defina uma senha </li>
                    </ul>
                    <br>
                    {{-- <p class="code">{{ substr($token, 0, 3) . substr($token, -3) }}</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
