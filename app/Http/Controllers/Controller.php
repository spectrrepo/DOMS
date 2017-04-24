<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // #TODO: сделать валидации для всех контроллеров https://laravel.ru/docs/v5/validation
    public function store(Request $request)
	{
	  $this->validate($request, [
	    'title' => 'required|unique:posts|max:255',
	    'body' => 'required',
	  ]);
	  protected function formatValidationErrors(Validator $validator)
	  {
	    return $validator->errors()->all();
	  }

	  // Статья прошла проверку, сохранение в БД...
	}
}
