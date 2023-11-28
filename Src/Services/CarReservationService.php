<?php

namespace Src\Services;

use Laminas\Diactoros\ServerRequest;
use ORM;

class CarReservationService
{
    public function createReservation(array $data): void
    {
        $reservation = ORM::for_table('reservation')->create();

        $reservation->cars_id = $data['selected-car'];
        $reservation->place_start = $data['pickup-location'];
        $reservation->place_end = $data['dropoff-location'];
        $reservation->date_start = $this->format($data['pick-up']);
        $reservation->date_end = $this->format($data['drop-off']);
        $reservation->name = $data['first-name'];
        $reservation->surname = $data['last-name'];
        $reservation->age = $data['age'];
        $reservation->phone = $data['phone-number'];
        $reservation->email = $data['email-address'];

        $reservation->save();
    }
    
    private function format(string $date): string
    {
        $date = date_parse($date);

        return $date['year'] . '-' . $date['month'] . '-' . $date['day'] . ' ' . $date['hour'] . ':' . $date['minute'] . ':' . $date['second'];
    }
    public function selectCars(View $view)
    {
        $items = ORM::for_table('notes')->find_many();

        return $view->make('main.index', [
            "items" => $notes,
        ]);
    }
}