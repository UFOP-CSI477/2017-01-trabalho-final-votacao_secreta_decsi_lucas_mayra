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
            <?php
              $total = App\Resultado::where('pauta_id', $pauta->id)->count();
              $sim = App\Resultado::where('pauta_id', $pauta->id)
                                      ->where('voto', 1)->count();
              $nao = App\Resultado::where('pauta_id', $pauta->id)
                                      ->where('voto', 2)->count();
              $abs = App\Resultado::where('pauta_id', $pauta->id)
                                      ->where('voto', 3)->count();
            ?>
            Total: {{$total}} |
            A favor: {{$sim}} |
            Contrários: {{$nao}} |
            Abstenções: {{$abs}} |
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
            @if (App\Resultado::where([
                                ['user_id','=', Auth::user()->id],
                                ['pauta_id', '=', $pauta->id]
                                ])->first() == false )
              <a class="btn btn-primary btn-sm" href="/resultados/create/{{ $pauta->id }}">Votar</a>
            @else
            <?php $voto = App\Resultado::where('user_id', Auth::user()->id)->where('pauta_id', $pauta->id)->first();?>
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <legend></legend>
                  <legend>
                    voto:                  {{ $voto['voto']}}<br>
                    comentario:            {{ $voto['comentario']}}<br>
                  </legend>
                </div>
              </div>
            @endif
        @else
        <?php $votos = App\Resultado::where('pauta_id', $pauta->id)->get(); ?>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <legend></legend>
            <legend>
              @foreach ($votos as $voto)
                comentario:            {{ $voto['comentario']}}<br>
              @endforeach
            </legend>
          </div>
        </div>
        @endif
  		</div>
    </div>
  @endforeach

@endsection
