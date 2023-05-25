<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

Class PostController extends Controller
{
    public function store (Request $request)
{
    $validator = Validator:: make ($request->all(),
    [
        'title'=> 'required|unique:posts|max:255',
        'body'=>'required',
    ]);

    if ($validator->fails()) {
        return redirect('post/create')
                    ->withErrors($validator)
                    ->withInput();
    }
}
}
