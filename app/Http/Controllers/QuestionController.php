<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function store ():RedirectResponse{

        $attributes = request()->validate([
                'question'=>['required']
            ]);

        Question::query()->create($attributes);
        

        return to_route('dashboard');
    }
}