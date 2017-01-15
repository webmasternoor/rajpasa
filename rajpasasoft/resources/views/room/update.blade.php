<h2 class="page-header">Edit Room</h2>
{!! Form::model($room,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("room._form")
{!! Form::close() !!}