<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'question' => [
                'required',
                'string',
                'min:10',
                'unique:questions,question',
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '?')) {
                        $fail('Are you sure that is a question? It is missing the question mark in the end.');
                    }
                },
            ],

        ]);

        Question::create([
            'question' => $attributes['question'],
            'draft' => true,
        ]);

        return to_route('dashboard');
    }
}
