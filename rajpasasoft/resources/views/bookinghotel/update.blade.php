<h2 class="page-header">Edit Bookinghotel</h2>
{!! Form::model($bookinghotel,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("bookinghotel._form")
{!! Form::close() !!}