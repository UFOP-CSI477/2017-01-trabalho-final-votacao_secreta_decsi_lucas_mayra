@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen"style="color:#9a1818">
		<div class="row">
			<div class="col-md-14 col-md-offset-0" >
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border"></div>
					<div class="box-body">
							@yield('conteudo')
				  </div>
				</div>

			</div>
		</div>
	</div>
@endsection
