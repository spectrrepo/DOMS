<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

use App\Models\Feedback;

class FeedbacksController extends Controller
{

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMail () {

        $messages = new Feedback();
        $messages->name = $_POST['name'];
        $messages->e_mail = $_POST['e_mail'];
        $messages->text_message = $_POST['text'];

        Mail::raw($_POST['text'], function($message)
        {
            $message->from('info@domspectr.ru', 'DOMS');

            $message->to($_POST['e_mail'])->subject('Вопросы и предложения');
        });

        $messages->save();

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mailIndex () {

        $messages = Feedback::paginate(10);

        return view('moderator.message', ['messages' => $messages]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mailIndexItem ($id) {

        $message = Feedback::find($id);
        $message->status = 'read';
        $message->save();

        return view('moderator.message_answer', ['message' => $message]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMail ($id) {

        $message = Feedback::find($id);
        $message->delete();

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function askOnMail () {

        $text = $_POST['text'];

        Mail::raw($text, function($message)
        {
            $message->from('info@domspectr.ru', 'DOMS');

            $message->to($_POST['mail_send'])->subject($_POST['thema']);
        });

        return redirect()->back();
    }
}
