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
        $Monsters = Monster::all();
        (new View())->json($Monsters->toArray());
    }

    public function createMonster(Request $request): void
    {
        if ($Monsters = Monster::create($request->all())) {
            (new View())->json($Monsters->toArray());
        }
    }

    public function deleteMonster(Request $request): void
    {
        $id = $request->id();
    
        Monster::where("id", $id)->delete();
    
        $Monsters = Monster::all();
        (new View())->json($Monsters->toArray());
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
                $Monsters = Monster::all();
        }
        (new View())->json($Monsters->toArray());
    }

}