<?php

namespace Controller;

use Model\Monster;
use Src\Request;
use Src\View;
use Src\Auth\Auth;


class Monsters
{

    private $upload_dir = __DIR__ . '/../../public/images/';

    public function viewMonster(Request $request): void
    {
        if($Monsters = Monster::all()){
            (new View())->json(['message' => 'Успешно', "Monsters" => $Monsters->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function createMonster(Request $request): void
    {
        if ($Monsters = Monster::create($request->all())) {
            (new View())->json($Monsters->toArray());
        }
    }

    public function deleteMonster(Request $request): void
    {
        if(Monster::where("id", $request->get('id'))->delete()){
            $Monsters = Monster::all();
            (new View())->json(['message' => 'Успешно', "Monsters" => $Monsters->toArray()], 200);
        }{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function redactMonster(Request $request): void
    {
        Monster::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "avatar" => $request->get('avatar'),
            "healt" => $request->get('healt'),
            "damage" => $request->get('damage'),
            "quantity" => $request->get('quantity'),
            "stun_id" => $request->get('stun_id'),
            "moons_id" => $request->get('moons_id')
        ]);
        
        $Monsters = Monster::all();
        (new View())->json($Monsters->toArray());
    }

    public function searchMonster(Request $request): void
    {
        $search = $request->get('search');

        if ($search) {
            $search = strtoupper($search);

            $Monsters = Monster::whereRaw(
                "UPPER(name) LIKE '%" . $search . "%'"
            )->get();
        } else {
            (new View())->json(['message' => 'Вы нечего не ввели'], 400);
        }
        (new View())->json($Monsters->toArray());
    }
}