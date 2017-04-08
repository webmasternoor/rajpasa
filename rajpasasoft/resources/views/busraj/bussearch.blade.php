@if (Auth::guest())

@else

<!-- <h2 class="page-header">Bus Search</h2> -->
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("busraj._formbussearch")
{!! Form::close() !!}
@endif