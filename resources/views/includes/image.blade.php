    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card pub_image">
                <div class="card-header">


                  @if($image->user->image)
                <div class="container-avatar">
                  
  <img src="{{ route('user.avatar',['filename'=>$image->user->image])}}">

                </div>
                <div class="data-user">
                  <a href="{{ route('image.detail',['id' => $image->id]) }}">
                 </div>
               @endif
{{$image->user->name.' '.$image->user->surname . ' | @' .$image->user->nick}}
                </div>
 </a>

                <div class="card-body">
                  <div class="image-container">
                    
                               <img src="{{ route('image.file', ['filename' => $image->image_path]) }}">         
                  </div>


                  <div class="description">

                    <p class="nickname">@ {{ $image->user->nick }}</p>
                       {{\FormatTime::LongTimeFilter($image->created_at) }}
                    <br> {{$image->description }}
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


                  <div class="comments">
                    
                    <a href="" class="btn btn-warning btn-coments">Comentarios:  {{ count($image->comments) }}</a> 
                  </div>

                </div>
            </div>
        
        </div>

    </div>
