<?php

namespace Src\Controllers;

use Exception;
use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\ServerRequest;
use Src\Services\FeedbackService;

class FeedbackController
{
    public function feedback(ServerRequest $request, FeedbackService $feedbackService): EmptyResponse
    {
        $body = $request->getParsedBody();

        try {
            $feedbackService->feedbackCreate($body);

            return new EmptyResponse(200);
        } catch (Exception $e) {
            return new EmptyResponse(400);
        }
    }
}