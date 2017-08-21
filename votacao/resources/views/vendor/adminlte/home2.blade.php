@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen"style="color:#9a1818">
		<div class="row">
			<div class="col-md-14 col-md-offset-0" >

				@yield('conteudo')

			</div>
		</div>
	</div>
@endsection
