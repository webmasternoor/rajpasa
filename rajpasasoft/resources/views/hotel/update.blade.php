<h2 class="page-header">Edit Hotel</h2>
{!! Form::model($hotel,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("hotel._form")
{!! Form::close() !!}