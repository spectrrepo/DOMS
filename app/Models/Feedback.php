<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model {
	use SoftDeletes;

	protected $table = 'feedbacks';
    protected $dates = ['date_ask', 'deleted_at'];
    public $timestamps = false;
    public $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required|max:255',
        'answer' => 'max:255',
    ];

    public function getDates ()
    {
        return ['date_ask', 'date_answer'];
    }

	public function user ()
    {
		return $this->belongsTo('App\Models\User', 'user_answer', 'id');
	}
}
