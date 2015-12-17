<?php
App::uses("AppController", "Controller");
App::import("Vendor", "nusoap/nusoap");

class ToursController extends AppController {
  public $uses = array();

  public function index(){
    $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
    $error = $client->getError();

    if ($error) $this->set("error", $error);
    else {
      $result = $client->call("findByCity", array("city" => "CITY"));
      if ($client->fault) $this->set("error", $result);
      else {
        $error = $client->getError();
        if ($error) $this->set("error", $error);
        else $this->set("result", json_decode($result, true));
      }
    }
  }

  public function view($id = NULL){
    if ($id == NULL) return;
    $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
    $error = $client->getError();

    if ($error) $this->set("error", $error);
    else {
      $result = $client->call("findTourById", array("id" => $id));
      if ($client->fault) $this->set("error", $result);
      else {
        $error = $client->getError();
        if ($error) $this->set("error", $error);
        else $this->set("result", $result);
      }
    }
  }
}
