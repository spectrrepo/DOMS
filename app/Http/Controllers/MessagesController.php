<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\MessageMail;
use Mail;

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class MessagesController extends Controller
{

    /**
     * @param
     *
     * @return
     *
     */
    public function sendMail () {

        $messages = new MessageMail();
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

    public function mailIndex () {

        $messages = MessageMail::paginate(10);

        return view('moderator.message', ['messages' => $messages]);
    }
    public function mailIndexItem ($id) {
        $message = MessageMail::find($id);
        $message->status = 'read';
        $message->save();

        return view('moderator.message_answer', ['message' => $message]);
    }
    /**
     * @param
     *
     * @return
     *
     */
    public function deleteMail ($id) {

        $message = MessageMail::find($id);
        $message->delete();

        return redirect()->back();
    }

    /**
     * @param
     *
     * @return
     *
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
