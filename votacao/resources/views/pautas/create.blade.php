@extends('vendor.adminlte.home')

@section('conteudo')

<a class="btn btn-primary right" href="/pautas/index/{{$reuniao->id}}">voltar</a>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" role="form" method="post" action="/pautas">
        {{ csrf_field() }}
        <fieldset>

          <legend>Add Pauta</legend>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Reunião</label>
            <div class="col-sm-9">
              <input type="number" name="reuniao_id" value="{{ $reuniao->id }}" readonly="readonly"  class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Nome</label>
            <div class="col-sm-9">
              <input type="text" name="nome" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Descrição</label>
            <div class="col-sm-9">
              <textarea type="text" name="descricao" class="form-control" rows="3"></textarea>
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
