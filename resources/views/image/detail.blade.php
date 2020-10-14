@extends('layouts.app')

@section('content')
<div class="container">
@include('includes.message')
    <div class="row justify-content-center">
        <div class="col-md-10">
       	
            <div class="card pub_image pub_image_detail">
                <div class="card-header">


                  @if($image->user->image)
              	<div class="container-avatar">
              		
                    <img src="{{ route('user.avatar',['filename'=>$image->user->image])}}">

              	</div>
               @endif
{{$image->user->name.' '.$image->user->surname . ' | @' .$image->user->nick}}
                </div>
 

                <div class="card-body">
                  <div class="image-container image-detail">
                    
                               <img src="{{ route('image.file', ['filename' => $image->image_path]) }}">         
                  </div>


                  <div class="description">
                    <p class="nickname">@ {{ $image->user->nick }}</p>
                    {{ $image->description }}
                  </div>
                  <div class="likes">                 
                      <?php $user_like = false; ?>

                    {{ count($image->likes) }}
                    @foreach($image->likes as $like)
                    @if($like->user->id = Auth::user()->id )
                                  <?php $user_like = true; ?>
                      @endif
                    @endforeach

                    @if($user_like)
                    <img src="{{ asset('img/heart-red.png') }}" data-id="{{ $image->id }}" class="btn-dislike">
                    @else
                    <img src="{{ asset('img/heart-black.png') }}" class="btn-like" data-id="{{ $image->id }}">
                    @endif
                      <br>
                  </div>

@if(Auth::user() && Auth::user()->id == $image->user->id)

        <div class="actions">       	
        	<a href="{{ route('image.edit',['id'=>$image->id] )}}" class="btn btn-warning">Editar Imagen</a> 
        

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
 Borrar Imagen
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Borrar Imagen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Borrar imagen, comentarios y likes de esta Foto.
      </div>
      <div class="modal-footer">
      	<a href="{{ route('image.delete', ['id'=>$image->id])}}" class="btn btn-danger">Borrar Imagen</a>
    
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>




        </div>
@endif
                  <div class="comments">
                    
                    <h2>Comentarios:  {{ count($image->comments) }} </h2>
                    
                  </div>
                  <form method="POST" action=" {{ route('comment.save') }}">
                    @csrf


                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                    <textarea class="form-control" name="content" required=""></textarea>
                    <button type="submit" class="btn btn-success">ENVIAR COMENTARIO</button>
                      @if($errors->has('content'))
                      <p class="alert alert-danger" role="alert">
                                        {{ $erros->first('content') }}
      

                      </p>

                      @endif

                    </form>
                    <hr>
                    @foreach($image->comments as $comment)
                    <hr>
                      <div class="comment">
@if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
     <p> <a class="btn btn-sm btn-danger" href="{{ route('comment.delete', ['id' => $comment->id]) }}">ELIMINAR COMENTARIO</a></p>


                      @endif
                  
                   
                    <p> {{ $comment->content }}</p>
           <p class="nickname">@ {{ $comment->user->nick }} | {{\FormatTime::LongTimeFilter($comment->created_at) }}</p>

    
                      
                       </div>
                    @endforeach
                </div>
            </div>
        
        </div>


    </div>


<div class="clearfix"></div>

</div>





@endsection
