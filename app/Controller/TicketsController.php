<?php
App::uses("AppController", "Controller");
App::import("Vendor", "nusoap/nusoap");

class TicketsController extends AppController {
  public function book(){
    $tours = $this->getAllTours();

    if ($tours == NULL) {
      $this->set("message", "Error on connecting to Travel webservices");
      $this->set("error", "yes");
      return;
    }
    $this->set("tours", $tours);
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
}
