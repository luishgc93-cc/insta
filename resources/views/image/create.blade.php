@extends('layouts.app')

@section('content')

<div class="container">
          @include('includes.message')

                    @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message')}}

                </div>
                @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
 







<div class="card">
    
    <div class="card-header">Subir Imagen</div>



<div class="card-body">
    <form method="POST" action="{{ Route ('image.save') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            
            <label for="Image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>
            <div class="col-md-6">
                
                <input id="Image_path" type="file" name="Image_path" class="form-control" required="" />  


                @if($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path')}}</strong>
                    </span>
                @endif

            </div>


        </div>

        <div class="form-group row">
            
            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>
            <div class="col-md-6">
                
                <textarea id="descripcion" type="text" name="descripcion" class="form-control" required=""> </textarea>   


                @if($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description')}}</strong>
                    </span>
                @endif

            </div>


        </div>




        <div class="form-group row">
            
          
            <div class="col-md-6 offset-md-6">
                
             <input type="Submit" name="" class="btn btn-primary" value="subir imagen" />
            </div>


        </div>


</div>

    </form>




</div>













           
            </div>
        </div>
    </div>
</div>

@endsection