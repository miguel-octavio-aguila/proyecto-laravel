<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        // Solo usuarios autenticados pueden dar like
        $this->middleware('auth');
    }

    public function like($image_id)
    {
        // Recoger datos del usuario y la imagen
        $user = Auth::user();
        // Condicion para ver si ya existe el like y no duplicarlo
        $isset_like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->count();
        if($isset_like == 0){
            $like = new Like();
            $like->user_id = $user->id;
            // Convertir a entero
            $like->image_id = (int)$image_id;
            // Guardar
            $like->save();
            // Respuesta en formato JSON
            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'Like is already given'
            ]);
        }
    }

    public function dislike($image_id)
    {
        // Recoger datos del usuario y la imagen
        $user = Auth::user();
        // Condicion para ver si ya existe el like y no duplicarlo
        $like = Like::where('user_id', $user->id)
                            ->where('image_id', $image_id)
                            ->first();
        if($like){
            // Eliminar like
            $like->delete();
            return response()->json([
                'like' => $like,
                'message' => 'Like deleted'
            ]);
        }else{
            return response()->json([
                'message' => 'Like not found'
            ]);
        }
    }

    public function index()
    {
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        return view('like.index', [
            'likes' => $likes
        ]);
    }
}
