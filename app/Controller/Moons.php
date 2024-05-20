<?php

namespace Controller;

use Model\Moon;
use Model\User;
use Model\Tier;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Moons
{
    public function viewMoon(Request $request): void
    {
        if ($Moons = Moon::all()){
            (new View())->json(['message' => 'Успешно', "Moons" => $Moons->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function createMoon(Request $request): void
    {
        if ($Moons = Moon::create($request->all())) {
            (new View())->json(['message' => 'Успешно', "Moons" => $Moons->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function deleteMoon(Request $request): void
    {
        if (Moon::where("id", $request->get('id'))->delete()){
            $Moons = Moon::all();
            (new View())->json(['message' => 'Успешно', "Moons" => $Moons->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function redactMoon(Request $request): void
    {
       if(Moon::where("id", $request->get('id'))->update([
        "name" => $request->get('name'),
        "tier_id" => $request->get('tier_id'),
        "cost" => $request->get('cost'),
        "number_of_items" => $request->get('number_of_items'),
        "weather" => $request->get('weather')
        ])){
            $Moons = Moon::all(); 
            (new View())->json(['message' => 'Успешно', "Moons" => $Moons->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }
}