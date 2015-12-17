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

  public function add() {
    $places = $this->getAllPlaces();
    if ($places) $this->set("places", $places);
    else $this->set("error", "Error on connect Travel webservices");
  }

  public function create(){
    if ($this->request->is("post")){
      $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
      $error = $client->getError();
      if ($error) $this->set("message", "Error on connnecting Travel webservices");
      else{
        $result = $client->call("addNewTour", $this->request->data);

        if ($client->fault) $this->set("message", "Error on connnecting Travel webservices");
        else
          if ($result == -1){
            $this->set("message", "Created new tour success");
            $this->redirect("/tours/view/" . $this->request->data["id"]);
          } else {
            $places = $this->getAllPlaces();
            if ($places) $this->set("places", $places);
            else $this->set("error", "Error on connect Travel webservices");

            $message = $this->setWarningNew($result);
            $this->set("message", $message);
            $this->set("tour", $this->request->data);
            $this->render("/Tours/add");
          }
      }
    }
  }

  public function edit($id = NULL){
    if ($id == NULL) {
      $this->set("message", "Tour id is not present.");
      return;
    }

    $places = $this->getAllPlaces();
    if ($places) $this->set("places", $places);
    else $this->set("message", "Error on connect Travel webservices");

    $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
    $error = $client->getError();

    if ($error) $this->set("message", $error);
    else {
      $result = $client->call("findTourById", array("id" => $id));
      if ($client->fault) $this->set("message", $result);
      else {
        $error = $client->getError();
        if ($error) $this->set("message", $error);
        else
          if (json_decode($result))
            $this->set("tour", json_decode($result, true));
          else $this->set("message", $result);
      }
    }
  }

  public function update(){
    if ($this->request->is("post")){
      $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
      $error = $client->getError();

      if ($error) $this->set("message", $error);
      else {
        $result = $client->call("updateTour", $this->request->data);
        if ($client->fault) $this->set("message", $result);
        else {
          $error = $client->getError();
          if ($error) $this->set("message", $error);
          else
            if ($result == -1) {
              $this->set("message", "Edit success");
              $this->redirect("/tours/view/" . $this->request->data["id"]);
            } else {
              $this->set("message", $this->setWarningNew($result));
              $places = $this->getAllPlaces();

              if ($places) $this->set("places", $places);
              else $this->set("message", "Error on connect Travel webservices");
              $this->set("tour", $this->request->data);
              $this->render("/Tours/edit");
            }
        }
      }
    }
  }

  private function setWarningNew($result){
    switch ($result) {
      case 0: return "Start date is not present.";
      case 1: return "Start date don't have valid format.";
      case 2: return "Tickets must be greater than 0.";
      case 3: return "Cost must be greater than 0.";
      case 4: return "Description is not present.";
      case 5: return "Place is not present.";
      case 6: return "Place is not existed in database.";
      case 7: return "ID is not present.";
      case 8: return "ID is existed in database.";
      case 9: return "Error on execution query.";
      default: return NULL;
    }
  }

  private function getAllPlaces(){
    $client = new nusoap_client("http://localhost/TravelWS/travel_services.wsdl", true);
    $error = $client->getError();

    if ($error) return NULL;
    else {
      $result = $client->call("getAllPlaces");
      if ($client->fault) return NULL;
      else {
        $error = $client->getError();
        if ($error) return NULL;
        else return json_decode($result, true);
      }
    }
  }
}
