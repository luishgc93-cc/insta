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
    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
    @csrf
    <input id="image[user_id]" type="hidden" name="image[user_id]" class="form-control" value!="{{ $user->id }}" required />
    <div class="form-group row">

        <label for="image[path]" class="col-md-4 col-form-label text-md-right">Imagen</label>
        <div class="col-md-6">

            <input id="image[path]" type="file" name="image[path]" class="form-control" required />

            @if($errors->has('image.path'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image.path')}}</strong>
            </span>
            @endif

        </div>
    </div>

    <div class="form-group row">

        <label for="image[description]" class="col-md-4 col-form-label text-md-right">Descripción</label>
        <div class="col-md-6">

            <textarea id="image[description]" type="text" name="image[description]" class="form-control" required> </textarea>
            @if($errors->has('image.description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image.description')}}</strong>
            </span>
            @endif

            <input type="Submit" name="" class="btn btn-primary" value="subir imagen" />
        </div>
    </div>
</form>




</div>
         
            </div>
        </div>
    </div>
</div>

@endsection