<?php

namespace Controller;

use Model\Scrab;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Scrabs
{
    public function viewScrab(Request $request): void
    {
        $Scrabs = Scrab::all();
        (new View())->json($Scrabs->toArray());
    }

    public function createScrabs(Request $request): void
    {
        if ($Scrabs = Scrab::create($request->all())) {
            (new View())->json($Scrabs->toArray());
        }
    }

    public function deleteScrabs(Request $request): void
    {
        Scrab::where("id", $request->get('id'))->delete();
        $Scrabs = Scrab::all();
        (new View())->json($Scrabs->toArray());
    }

    public function redactMoon(Request $request): void
    {
        Scrab::where("id", $request->get('id'))->update([
        "name" => $request->get('name'),
        "Scrab_id" => $request->get('Scrab_id'),    
        "cost" => $request->get('cost'),
        "number_of_items" => $request->get('number_of_items'),
        "weather" => $request->get('weather')
        ]);

        $Scrabs = Scrab::all(); 
        (new View())->json($Scrabs->toArray());
        
    }
}