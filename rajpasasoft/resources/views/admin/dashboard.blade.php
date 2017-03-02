@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 panel panel-default">
                left
                @include('partials.sidebar-menu')
            </div>
            <div class="col-md-10 panel panel-default">
                <div class="panel-heading">right</div>
                <div class="panel-body">
                    Your Application's Landing Page. Admin Landing Page
                </div>
            </div>
        </div>
        <!-- <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
        
                <div class="panel-body">
                    Your Application's Landing Page. Admin Landing Page
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection