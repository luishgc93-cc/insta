<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = Auth::user();
        return view('image.create', compact('user'));
    }

    public function store(Request $request)
    {
        //Validación
        $validation =
            Validator::make(
                $request->all(),
                [
                    'image.description' => 'required',
                    'image.path'  => 'required|image'
                ]
            );

        if ($validation->errors()) {
            Image::create($request->image);
            return redirect()->route('image.create')->with([
                'message' => 'La foto ha sido subida correctamente'
            ]);
        } else {
            return redirect()->route('image.create')->with([
                'message' => 'Existen errores'
            ]);
        }
    }
}