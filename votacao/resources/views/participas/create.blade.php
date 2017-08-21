@extends('vendor.adminlte.home')

@section('conteudo')

<a class="btn btn-primary right" href="/salas">voltar</a>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" role="form" method="post" action="/participas">
        {{ csrf_field() }}
        <fieldset>

          <legend>Add Usuário a Sala</legend>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Sala</label>
            <div class="col-sm-9">
              <span><i aria-hidden="true"></i></span>
              <select class="col-sm-6 form-control" name="sala_id">
                @foreach($salas as $sala)
                  <option value="{{$sala->id}}">{{$sala->nome}}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Usuário</label>
            <div class="col-sm-9">
            <span><i aria-hidden="true"></i></span>
              <select class="col-sm-6 form-control" name="user_id">
                @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
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
