<?php

namespace Controller;

use Model\Terminal;
use Src\Request;
use Src\View;

class Terminals
{
    public function viewTerminal(Request $request): void
    {
        if($Terminals = Terminal::all()){
            (new View())->json(['message' => 'Успешно', "Terminals" => $Terminals->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
        
    }

    public function createTerminal(Request $request): void
    {
        if ($Terminals = Terminal::create($request->all())) {
            (new View())->json(['message' => 'Успешно', "Terminals" => $Terminals->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Ошибка создания'], 400);
        }
    }

    public function deleteTerminal(Request $request): void
    {
        if(Terminal::where("id", $request->get('id'))->delete()){
            $Terminals = Terminal::all();
            (new View())->json(['message' => 'Успешно', "Terminals" => $Terminals->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }

    public function redactTerminal(Request $request): void
    {
        if(Terminal::where("id", $request->get('id'))->update([
            "title" => $request->get('title'),
            "description" => $request->get('description')
        ])){
            $Terminals = Terminal::all();
            (new View())->json(['message' => 'Успешно', "Terminals" => $Terminals->toArray()], 200);
        }else{
            (new View())->json(['message' => 'Непредвиденная ошибка'], 500);
        }
    }
}
