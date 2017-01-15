<h2 class="page-header">Edit Counter</h2>
{!! Form::model($counter,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("counter._form")
{!! Form::close() !!}