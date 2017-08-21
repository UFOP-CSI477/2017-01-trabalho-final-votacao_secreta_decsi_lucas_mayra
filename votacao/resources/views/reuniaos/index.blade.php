@extends('vendor.adminlte.home')

@section('conteudo')

<h1>
    Reuniao
</h1>
@if (Auth::user()->type == 1)
<a class="btn btn-primary" href="/reuniaos/create">Inserir</a>
@endif
 <div class="container-fluid spark-screen">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Entrar</th>
        <th>Sala</th>
        <th>data</th>
        @if (Auth::user()->type == 1)
          <th>Editar</th>
          <th>Excluir</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($reuniaos as $reuniao)
      <tr>
        <td><a method="get" href="/pautas/index/{{ $reuniao->id }}"><i class="fa fa-bookmark" style="font-size:20px"></i></a></td>
          <td>{{ App\Sala::find($reuniao->sala_id)->nome }}</i></a></td>
          <td>{{ $reuniao->date}}</td>
          @if (Auth::user()->type == 1)
            <td><a href="/reuniaos/{{ $reuniao->id }}/edit"><i class="fa fa-pencil fa-fw" style="font-size:20px"></i></a></td>
            <td><a href="/reuniaos/{{ $reuniao->id }}"><i class="fa fa-trash-o fa-fw" style="font-size:20px"></i> </a></td>
          @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
