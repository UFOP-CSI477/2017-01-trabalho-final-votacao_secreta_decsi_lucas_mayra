@extends('vendor.adminlte.home')

@section('conteudo')

<a class="btn btn-primary right" href="/pautas/index/{{$reuniao->id}}">voltar</a>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" role="form" method="post" action="/resultados">
        {{ csrf_field() }}
        <fieldset>

          <legend>Votar</legend>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Pauta</label>
            <div class="col-sm-9">
              <input type="number" name="pauta_id" value="{{ $pauta->id }}" readonly="readonly"  class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">User Id</label>
            <div class="col-sm-9">
              <input type="text" name="user_id" value="{{ Auth::user()->id }}"  readonly="readonly" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Voto</label>
            <div class="col-sm-9">
            <span><i aria-hidden="true"></i></span>
              <select class=" form-control" name="voto">
                  <option value="1">A Favor</option>
                  <option value="2">Contra</option>
                  <option value="3">Abstenção</option>
              </select>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Comentario</label>
            <div class="col-sm-9">
              <textarea type="text" name="comentario" value="OK"  class="form-control" rows="3"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

@endsection
