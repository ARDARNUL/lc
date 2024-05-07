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
}
