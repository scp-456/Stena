<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FieldRequest;

class FormController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(FieldRequest $request)
    {
        $validatedData = $request->validated();
        \App\Form::create($validatedData);

        return response()->json('Форма успешно проверена, и данные сохранены');
    }
}
