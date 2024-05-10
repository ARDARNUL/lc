<?php

namespace Controller;

use Model\Moon;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Moons
{
    public function viewMoon(Request $request): void
    {
        $Moons = Moon::all();
        (new View())->json($Moons->toArray());
    }

    public function createMoons(Request $request): void
    {
        if ($Moons = Moon::create($request->all())) {
            (new View())->json($Moons->toArray());
        }
    }

    public function deleteMoons(Request $request): void
    {
        Moon::where("id", $request->get('id'))->delete();
        $Moons = Moon::all();
        (new View())->json($Moons->toArray());
    }

    public function redactMoon(Request $request): void
    {
                Moon::where("id", $request->get('id'))->update([
                "name" => $request->get('name'),
                "tier_id" => $request->get('tier_id'),
                "cost" => $request->get('cost'),
                "number_of_items" => $request->get('number_of_items'),
                "weather" => $request->get('weather')
            ]);

            $Moons = Moon::all();
            (new View())->json($Moons->toArray());
        
    }

}