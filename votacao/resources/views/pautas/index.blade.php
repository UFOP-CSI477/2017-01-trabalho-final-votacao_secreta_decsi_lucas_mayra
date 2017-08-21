@extends('vendor.adminlte.home2')

@section('conteudo')

  <section class="content-header">
      <h3>
        Reuniao - {{$reuniao->date}}
        @if (Auth::user()->type == 1)
          <a class="btn btn-primary btn-sm" href="/pautas/create/{{ $reuniao->id }}">Inserir Pauta</a>
        @endif

      </h3>
  </section>

  @foreach($pautas as $pauta)
    <div class="box">
  		<div class="box-header with-border">
  			<h3 class="box-title">Pauta: {{$pauta->nome}}</h3>
  			<div class="box-tools pull-right">
         <!-- @if (  $pauta->status  == 1 )
              <i class="fa fa-hourglass-3" style="font-size:16px">Fechado</i>
          @elseif (  $pauta->status  == 2 )
              <i class="fa fa-hourglass-half" style="font-size:16px">Aberto</i>
          @else
              <i></i>
          @endif -->

           @if (Auth::user()->type == 1)
            <!-- @if (  $pauta->status  == 1 )
              <a  href="/pautas/status/{{ $pauta->id }}">
                <i class="fa fa-history" style="font-size:16px"></i>Abrir</a>
            @elseif ($pauta->status  == 2 )
              <a  href="/pautas/{{ $pauta->id }}/status">
                <i class="fa fa-history" style="font-size:16px"></i>Fechar</a>

            @else
              <a  href="/pautas/{{ $pauta->id }}/status">
                <i class="fa fa-history" style="font-size:16px"></i>

                </a>
            @endif -->
            <a  href="/pautas/{{ $pauta->id }}/edit">
              <i class="fa fa-pencil" style="font-size:16px"></i></a>
              <a method="post" href="/pautas/{{ $pauta->id }}">
                <i class="fa fa-trash" style="font-size:16px"></i> </a>
          @endif

  				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
  					<i class="fa fa-minus"></i></button>
  			</div>
  		</div>

  		<div class="box-body">

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Descrição</label>
            <div class="col-sm-9">
              <p>{{ $pauta->descricao }}</p>
            </div>
          </div>

          @if (Auth::user()->type != 1)

            @if (! $resultado->find(Auth::user()->id))
              <br><br><p>Votar:</p>

              <div class="container">
                <form method="post" action="/resultados">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pauta id</label>
                    <div class="col-sm-2">
                      <input type="number" readonly="readonly" name="{{ $pauta->id}}" value="{{ $pauta->id}}">
                    </div>
                  </div>
                   <br><br><br>
                  <div class="form-group">
                    <label class="radio-inline ">
                      <input type="radio" name="voto" value="1">A favor
                    </label>
                    <label class="radio-inline ">
                      <input type="radio" name="voto" value="2">Contrario
                    </label>
                    <label class="radio-inline ">
                      <input type="radio" name="voto" value="3">Abstenção
                    </label>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9">
                      <textarea type="text" name="comentario" class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class=" col-sm-9">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              @else
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <legend></legend>
                    <legend>
                      voto:            {{ $resultado->voto }}<br>
                      comentario:          {{ $resultado->comentario }}<br>
                    </legend>

              </div>
            </div>
              @endif
        @endif
  		</div>
    </div>
  @endforeach

@endsection
