<?php

namespace Controller;

use Model\Terminal;
use Src\Request;
use Src\View;

class Terminals
{
    public function viewTerminal(Request $request): void
    {
        $Terminals = Terminal::all();
        (new View())->json($Terminals->toArray());
    }

    public function createTerminal(Request $request): void
    {
        if ($Terminals = Terminal::create($request->all())) {
            (new View())->json($Terminals->toArray());
        }
    }

    public function deleteTerminal(Request $request): void
    {
        Terminal::where("id", $request->get('id'))->delete();
        $Terminals = Terminal::all();
        (new View())->json($Terminals->toArray());
    }

    public function redactTerminal(Request $request): void
    {
        Terminal::where("id", $request->get('id'))->update([
            "title" => $request->get('title'),
            "description" => $request->get('description')
        ]);
        
        $Terminals = Terminal::all();
        (new View())->json($Terminals->toArray());
    }
}
