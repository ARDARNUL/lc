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

    public function createScrab(Request $request): void
    {
        if ($Scrabs = Scrab::create($request->all())) {
            (new View())->json($Scrabs->toArray());
        }
    }

    public function deleteScrab(Request $request): void
    {
        Scrab::where("id", $request->get('id'))->delete();
        $Scrabs = Scrab::all();
        (new View())->json($Scrabs->toArray());
    }

    public function redactScrab(Request $request): void
    {
        Scrab::where("id", $request->get('id'))->update([
        "name" => $request->get('name'),
        "min_cost" => $request->get('min_cost'),    
        "max_cost" => $request->get('max_cost'),
        "weight" => $request->get('weight'),
        "conducts_electricity_id" => $request->get('conducts_electricity_id'),
        "two_handed_id" => $request->get('two_handed_id')
        ]);

        $Scrabs = Scrab::all(); 
        (new View())->json($Scrabs->toArray());
        
    }
}