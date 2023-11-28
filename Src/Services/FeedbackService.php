<?php

namespace Src\Services;

use Laminas\Diactoros\ServerRequest;
use ORM;

class FeedbackService
{
    public function feedbackCreate(array $fields): void
    {
        $feedback = ORM::for_table('feedback')->create();

        $feedback->name = $fields['first-name'];
        $feedback->surname = $fields['last-name'];
        $feedback->phone = $fields['telephone'];
        $feedback->email = $fields['email'];
        $feedback->message = $fields['message'];

        $feedback->save();
    }

}