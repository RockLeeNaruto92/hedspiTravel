<?php
App::uses("AppController", "Controller");
App::import("Vendor", "nusoap/nusoap");

class TicketsController extends AppController {
  public function book(){
    $tours = $this->getAllTours();
    $hotels = $this->getAllHotels();
    $flights = $this->getAllFlights();

    if ($tours == NULL || $hotels == NULL || $flights == NULL) {
      $this->set("message", "Error on connecting to Travel, Hotel or Airline webservices");
      $this->set("error", "yes");
      return;
    }
    $this->set("tours", $tours);
    $this->set("hotels", $hotels);
    $this->set("flights", $flights);
  }

  private function getAllTours(){
    $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
    $error = $client->getError();

    if ($error) return NULL;
    else {
      $result = $client->call("getAllTours");
      if ($client->fault) return NULL;
      else {
        $error = $client->getError();
        if ($error) return NULL;
        else return json_decode($result, true);
      }
    }
  }

  private function getAllHotels(){
    $client = new nusoap_client("http://localhost/HotelWS/hotel_services.wsdl", true);
    $error = $client->getError();

    if ($error) return NULL;
    else {
      $result = $client->call("getAllHotels");
      if ($client->fault) return NULL;
      else {
        $error = $client->getError();
        if ($error) return NULL;
        else return json_decode($result, true);
      }
    }
  }

  private function getAllFlights(){
    $client = new nusoap_client("http://localhost/AirlineWS/airline_services.wsdl", true);
    $error = $client->getError();

    if ($error) return NULL;
    else {
      $result = $client->call("getAllFlights");
      if ($client->fault) return NULL;
      else {
        $error = $client->getError();
        if ($error) return NULL;
        else return json_decode($result, true);
      }
    }
  }
}
