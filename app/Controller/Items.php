<?php

namespace Controller;

use Model\Item;
use Src\Request;
use Src\View;
use Src\Auth\Auth;


class Items
{

    public function viewItem(Request $request): void
    {
        $Items = Item::all();
        (new View())->json($Items->toArray());
    }

    public function createItems(Request $request): void
    {
        if (Item::create($request->all())) {
            (new View())->json(['message' => 'Предмет создан успешно'], 200);
        }
        else{
            (new View())->json(['message' => 'Не удалось создать предмет'], 400);
        }
    }

    public function deleteItems(Request $request): void
    {
        Item::where("id", $request->get('id'))->delete();
    }

    public function redactItem(Request $request): void
    {
        if ($request->method === 'POST') {
        Item::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "avatar" => $request->get('avatar'),
            "type_id" => $request->get('type_id'),
            "cost" => $request->get('cost'),
            "weight" => $request->get('weight'),
            "presence_of_battery_id" => $request->get('presence_of_battery_id'),
            "conducts_electricity_id" => $request->get('conducts_electricity_id'),
        ]);
    }

    }


}