@if (Auth::guest())

@else

<h2 class="page-header">New Busraj</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("bussearch._form")
{!! Form::close() !!}
@endif