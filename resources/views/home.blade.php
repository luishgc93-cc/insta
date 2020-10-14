@extends('layouts.app')

@section('content')
<div class="container">
@include('includes.message')
@foreach($images as $image) 
  @include('includes.image',['image'=>$image])
 @endforeach


<div class="clearfix"></div>

{{ $images->links() }}

</div>





@endsection
