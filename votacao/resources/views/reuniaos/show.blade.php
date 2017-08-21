@extends('vendor.adminlte.home')

@section('conteudo')

<h1>Excluir Sala</h1>
<a class="btn btn-primary" href="/reuniao">Voltar</a>
<!-- <div class="container-fluid spark-screen"> -->



  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <legend></legend>
        <legend>Id:      {{ $reuniao->id }}<br>
        Sala:            {{ App\Sala::find($reuniao->id)->nome}}<br>
        Data:            {{ $reuniao->date  }}<br><br>

        <form class="form-horizontal" role="form" method="post" action="/reuniaos/{{ $reuniao->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <a class="btn btn-default" href="/reuniaos/{{ $reuniao->id }}/edit"><i class="fa fa-pencil fa-fw"></i>Editar</a>
        <input class="btn btn-primary" type="submit" value="Confirmar exclusão">

  </form>

@endsection
