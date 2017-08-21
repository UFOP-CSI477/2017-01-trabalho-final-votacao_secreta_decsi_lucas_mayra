@extends('vendor.adminlte.home')

@section('conteudo')

<a class="btn btn-primary right" href="/users">voltar</a>

<div class="register-box-body">
    <p class="login-box-msg">Editar usuário</p>
    <form method="post" action="/users/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome" name="name" value="{{ $user->name }}" autofocus/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        @if (config('auth.providers.users.field','email') === 'username')
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.username') }}" name="name" value="{{ $user->name }}" autofocus/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
        @endif

        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ $user->email }}"/>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="number" class="form-control" placeholder="Tipo" name="type" value="{{ $user->type }}"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-4 col-xs-push-1">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
            </div><!-- /.col -->
        </div>
    </form>
</div><!-- /.form-box -->

@endsection
