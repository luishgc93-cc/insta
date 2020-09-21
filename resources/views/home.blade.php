@extends('layouts.app')

@section('content')
<div class="container">
@include('includes.message')
@foreach($images as $image) 
    <div class="row justify-content-center">
        <div class="col-md-8">
       	
            <div class="card pub_image">
                <div class="card-header">


                  @if($image->user->image)
              	<div class="container-avatar">
              		
                    <img src="{{ route('user.avatar',['filename'=>$image->user->image])}}">

              	</div>
               @endif
{{$image->user->name.' '.$image->user->surname . ' | @' .$image->user->nick}}
                </div>
 

                <div class="card-body">

                </div>
            </div>
        
        </div>

    </div>
 @endforeach
</div>

@endsection
