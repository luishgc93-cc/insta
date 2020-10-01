@extends('layouts.app')

@section('content')

<div class="container">

    @include('includes.message')



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center><h3>  {{ Auth::user()->name }}  </li></h3> </center></div>


            </div>
        </div>
    </div>
</div>

@endsection