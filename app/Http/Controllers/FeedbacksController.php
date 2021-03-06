<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Mail;
use Auth;
use Input;
use Carbon\Carbon;

use App\Models\Feedback;

class FeedbacksController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add (Request $request)
    {
        $feedback = new Feedback();
        $v = \Illuminate\Support\Facades\Validator::make($request->all(), $feedback->rules);

        if ($v->fails())
        {
            return redirect()->back()->with('feedback', true)->withErrors($v->errors());
        }

        $feedback->name = Input::get('name');
        $feedback->email = Input::get('email');
        $feedback->message = Input::get('message');
        $feedback->save();

        Mail::raw(Input::get('message'), function($message)
        {
            $message->from('info@domspectr.ru', 'DOMS');

            $message->to(Input::get('email'))->subject('Вопросы и предложения');
        });

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listPage ()
    {
        $feedBacks = Feedback::paginate(10);

        return view('profile.moderator.feedback.list', ['feedBacks' => $feedBacks]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemPage ($id)
    {
        $message = Feedback::find($id);

        return view('profile.moderator.feedback.answer', ['message' => $message]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete ($id)
    {
        Feedback::find($id)->delete();

        return redirect()->back()->with('message', 'Сообщение успешно удалено');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function answer ($id)
    {
        $feedback = Feedback::find($id);
        $feedback->answer = Input::get('answer');
        $feedback->date_answer = Carbon::now();
        $feedback->user_answer = Auth::user()->id;
        $feedback->update();

        Mail::raw(Input::get('answer'), function($message)
        {
            $message->from('info@domspectr.ru', 'DOMS');
            $message->to(Input::get('email'))->subject(Input::get('thema'));
        });

        return redirect()->back()->with('message', 'Сообщение отправлено!');
    }
}
