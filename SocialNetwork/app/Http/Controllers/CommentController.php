<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        // con esto hacemos que todas las rutas de este controlador esten protegidas por el middleware auth
        $this->middleware('auth');
    }

    public function save(Request $request)
    {
        // Validacion
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        // Recoger datos
        $user = Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        // Asigno los valores a mi nuevo objeto a guardar
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        // Guardar en la base de datos
        $comment->save();

        // Redireccion
        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with(['message' => 'Comment created successfully']);
    }

    public function delete($id)
    {
        // Conseguir datos del usuario identificado
        $user = Auth::user();

        // Conseguir objeto del comentario
        $comment = Comment::find($id);

        // Comprobar si soy el dueño del comentario o de la publicacion
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)) {
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                             ->with(['message' => 'Comment deleted successfully']);
        } else {
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                             ->with(['message' => 'Comment could not be deleted']);
        }
    }
}
