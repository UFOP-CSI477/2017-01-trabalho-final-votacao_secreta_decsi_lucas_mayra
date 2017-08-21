@extends('vendor.adminlte.home')

@section('conteudo')

<h1>
    Sala
</h1>
@if (Auth::user()->type == 1)
  <a class="btn btn-primary" href="/salas/create">Inserir</a>
@endif
 <div class="container-fluid spark-screen">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Qtd. Usuários</th>
        <th>Qtd. Reuniões</th>
        @if (Auth::user()->type == 1)
          <th>Editar</th>
          <th>Excluir</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($salas as $sala)
      <tr>
          <td>{{ $sala->nome }}</td>
          <td>{{ App\Participa::where('sala_id', $sala->id)->count()}}</td>
          <td>{{ App\Reuniao::where('sala_id', $sala->id)->count()}}</td>
          @if (Auth::user()->type == 1)
            <td><a href="/salas/{{ $sala->id }}/edit"><i class="fa fa-pencil fa-fw" style="font-size:20px"></i></a></td>
            <td><a href="/salas/{{ $sala->id }}"><i class="fa fa-trash-o fa-fw" style="font-size:20px"></i></a></td>
          @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
