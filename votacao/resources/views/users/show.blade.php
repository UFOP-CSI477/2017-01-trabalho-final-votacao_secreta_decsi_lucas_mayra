@extends('vendor.adminlte.home')

@section('conteudo')

<h1>Excluir Usuário</h1>
<a class="btn btn-primary" href="/users">Voltar</a>
<!-- <div class="container-fluid spark-screen"> -->



  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <legend></legend>
        <legend>Id:      {{ $user->id }}<br>
        Nome:            {{ $user->name }}<br>
        E-mail:          {{ $user->email }}<br>
        Tipe:            {{ $user->type }} <br></legend>

        <form class="form-horizontal" role="form" method="post" action="/users/{{ $user->id }}">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <a class="btn btn-default" href="/users/{{ $user->id }}/edit"><i class="fa fa-pencil fa-fw"></i>Editar</a>
        <input class="btn btn-primary" type="submit" value="Confirmar exclusão">

  </form>
  </div>
</div>
@endsection
