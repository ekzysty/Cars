<?php

namespace Src\Controllers;

use Laminas\Diactoros\ServerRequest;
use Src\Services\CarReservationService;

class ReservationCarController
{
    public function create(ServerRequest $request, CarReservationService $carReservationService): void
    {
        $body = $request->getParsedBody();

        $carReservationService->createReservation($body);
    }
}