<?php

namespace App\Http\Controllers;

use App\Models\reviews; // Importa el modelo Reviews
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'review' => 'required|string',
            'product_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5' // Asegúrate de validar la calificación
        ], [
            'name.required' => 'Proporciona nombre.',
            'email.max' => 'Email con máximo 50 caracteres.',
            'review.required' => 'Favor de escribir el mensaje.',
            'rating.required' => 'Proporciona una calificación.',
            'rating.min' => 'La calificación debe ser al menos 1.',
            'rating.max' => 'La calificación no puede ser mayor a 5.',
        ]);

        $review = new reviews();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');
        $review->product_id = $request->input('product_id');
        $review->rating = $request->input('rating'); // Guarda la calificación
        $review->save();

        $product_id = $review->product_id;
        return redirect()->route('product_detail', ['id' => $product_id])->with('success', 'Your review has been sent.');
    }
}
