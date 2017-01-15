<h2 class="page-header">Edit Management</h2>
{!! Form::model($management,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("management._form")
{!! Form::close() !!}