<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Crear Jugador desde el Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPlayer(Request $request)
    {   
        try {
            if ($request->userId == 1) {                
                $newPlayer = User::firstOrCreate(
                    [
                        'name' => (string)$request->name,
                        'type' => $request->type,
                        'email' => $request->email,
                        'life' => (int) 100,
                    ]
                );
    
                return response()->json(array('message' => 'Jugador Creado Correctamente!'), 200);
            }

        } catch (\Exception $e) {
            return response()->json(array(
                'message' => "{$e->getMessage()} | {$e->getLine()}"
            ), 207);
        }
    }

    /**
     * Crear Items desde el Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createItem(Request $request)
    {   
        try {
            if ($request->userId == 1) {
                $newItem = Item::firstOrCreate(
                    [
                        'name' => (string)$request->name,
                        'type' => $request->type,
                        'cant_ataque' => (int) $request->cant_ataque,
                        'cant_defensa' => (int) $request->cant_defensa,
                    ]
                );
    
                return response()->json(array('message' => 'Item Creado Correctamente!'), 200); 
            }

        } catch (\Exception $e) {
            return response()->json(array(
                'message' => "{$e->getMessage()} | {$e->getLine()}"
            ), 207);
        }
    }


    /**
     * Editar Items desde el Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editItem(Request $request)
    {   
        try {
            if ($request->userId = 1) {
                $itemUpdate = Item::find($request->itemId);
    
                $itemUpdate->name = !empty($request->name) ? $request->name : $itemUpdate->name;
                $itemUpdate->type = !empty($request->type) ? $request->type : $itemUpdate->type;
                $itemUpdate->cant_ataque = !empty($request->cant_ataque) ? $request->cant_ataque : $itemUpdate->cant_ataque;
                $itemUpdate->cant_defensa = !empty($request->cant_defensa) ? $request->cant_defensa : $itemUpdate->cant_defensa;
    
                $itemUpdate->save();
    
                return response()->json(array('message' => 'Item Actualizado Correctamente!', 'item' => $itemUpdate), 200); 
            }
        } catch (\Exception $e) {
            return response()->json(array(
                'message' => "{$e->getMessage()} | {$e->getLine()}"
            ), 207);
        }
    }

    /**
     * Mostrar Player con Ulti
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function playersAdmin($userId)
    {   
        try {
            if ($userId == 1) {
                                
                $players = User::where('ulti', true)->get();
    
                return response()->json(array('players' => $players), 200); 
            }

        } catch (\Exception $e) {
            return response()->json(array(
                'message' => 'No hay jugadores con la "ulti" disponible'
            ), 207);
        }
    }
}
