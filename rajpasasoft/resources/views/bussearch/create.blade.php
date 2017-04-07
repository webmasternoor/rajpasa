@if (Auth::guest())
	<h3>please log in</h3>
@else
<h2 class="page-header">New Busraj</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("bussearch._form")
{!! Form::close() !!}
@endif