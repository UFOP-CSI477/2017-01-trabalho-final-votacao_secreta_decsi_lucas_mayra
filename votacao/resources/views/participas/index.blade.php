@extends('vendor.adminlte.home')

@section('conteudo')

<h1>
    Add Usuário a Sala
</h1>
@if (Auth::user()->type == 1)
<a class="btn btn-primary" href="/participas/create">Inserir</a>
@endif
 <div class="container-fluid spark-screen">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sala</th>
        <th>Usuário</th>
        @if (Auth::user()->type == 1)
          <th>Excluir</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($participas as $participa)
      <tr>
          <td>{{ App\Sala::find($participa->sala_id)->nome}}</td>
          <td>{{ App\User::find($participa->user_id)->name }}</td>
          @if (Auth::user()->type == 1)
            <td><a href="/participas/{{ $participa->id }}"><i class="fa fa-trash-o fa-fw" style="font-size:20px"></i></a></td>
          @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
