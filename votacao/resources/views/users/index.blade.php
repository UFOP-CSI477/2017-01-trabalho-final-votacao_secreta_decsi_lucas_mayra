@extends('vendor.adminlte.home')

@section('conteudo')

<h1>
    Usuários
</h1>
@if (Auth::user()->type == 1)
  <a class="btn btn-primary" href="/users/create">Inserir</a>
@endif
 <div class="container-fluid spark-screen">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail </th>
          <th>Tipo</th>
        @if (Auth::user()->type == 1)
          <th>Editar</th>
          <th>Excluir</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->type }}</td>
          @if (Auth::user()->type == 1)
              <td><a href="/users/{{ $user->id }}/edit"><i class="fa fa-pencil fa-fw" style="font-size:20px"></i></a></td>
                <td><a href="/users/{{ $user->id }}"><i class="fa fa-trash-o fa-fw" style="font-size:20px"></i> </a></td>
          @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
