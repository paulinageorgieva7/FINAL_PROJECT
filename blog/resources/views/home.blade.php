@extends('layouts.app')

@section('content')

<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category');
$slider = Session::get('slider');
$count = Session::get('count');
$cart_total = Session::get('cart_total');
?> 

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
