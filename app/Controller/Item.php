<?php

namespace Controller;

use Model\Item;
use Src\Request;
use Src\View;
use Src\Auth\Auth;


class Items
{

    public function Item(Request $request): void
    {
        $Items = Item::all();
        (new View())->json($Item->toArray());
    }

    public function createItems(Request $request): void
    {
        if ($request->method === 'GET') {
            return new View('site.createItems');
        }

        if (Item::create($request->all())) {
            app()->route->redirect('/Item');
        }
        app()->route->redirect('/Item');
    }

    public function deleteItems(Request $request): void
    {
        Item::where("id", $request->get('id'))->delete();
        app()->route->redirect('/Item');
        return "";
    }

    public function redactItem(Request $request): void
    {
        if ($request->method === 'POST') {
        Item::where("id", $request->get('id'))->update([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "price" => $request->get('price'),
            "kind_id" => $request->get('kind_id')
        ]);
    }
    return (new View())->render('site.redactItem');
    }


}