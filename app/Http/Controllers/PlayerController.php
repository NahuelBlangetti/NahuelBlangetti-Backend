<?php

namespace App\Http\Controllers;

use App\Models\AtaqueType;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserHasItem;

class PlayerController extends Controller
{
    /**
     * Agregar un item como jugador
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addItem(Request $request)
    {   
        if ($request->playerId != 1) {
            
            $player = User::find($request->playerId);
            $itemAdd = Item::find($request->itemId);
    
            /* Consulta para saber si ya tiene item de ese tipo*/
            foreach($player->item()->get() as $i) {
               if ($i->type == $itemAdd->type) {
                    $flag = true; /* En caso quetenga items de ese tipo el flag es True y tirar error  */
               }
            }
    
            if (!$flag) {
                UserHasItem::firstOrCreate(
                    [
                        'user_id' => $player->id,
                        'item_id' => $itemAdd->id,
                    ]
                );
        
                return response()->json(array('Si !!' => 'Item Agregado Correctamente!'), 207); 
    
            } else {
                return response()->json(array('Error' => 'Ya tienes en uso este Item!'), 207);
            }
        }
        else {
            return response()->json(array('Error' => 'Admin no puede add un item'), 207);
        }
    }

    /**
     * Inventario de Items
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inventarioItems()
    { 
        try {
            $items = Item::all();

            return response()->json(array('items' => $items), 200); 

        } catch (\Exception $e) {
            return response()->json(array(
                'message' => 'No hay items disponible!'
            ), 207);
        }
    }


    /**
     * Ataque de player a player
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ataque(Request $request)
    {
        if ($request->agresorId != 1) {

            $atacante = User::find($request->agresorId);
            $victima = User::find($request->victimaId);
            $typeAtaque = AtaqueType::find($request->ataqueId);
            
            $cantAtaque = $this->itemAtaque($atacante);
            $cantDefensa = $this->itemDenfensa($victima);
    
    
            if ($victima->life != 0) { // ¿Sigues con vida?
    
                if ($typeAtaque->id == 1) { // Ataque Cuerpo a Cuerpo
                    $atacante->ulti = true;
                    $atacante->save();
    
                    $victima->life = $cantDefensa -  $cantAtaque;
                    $victima->save();
                }
                elseif ($typeAtaque->id == 2) { // Ataque A Distancia
                    $ataqueTotal = $cantAtaque * 0.8;
                    
                    $atacante->ulti = false;
                    $atacante->save();
    
                    $victima->life = $cantDefensa - $ataqueTotal;
                    $victima->save();
                }
                elseif($typeAtaque->id == 3 && $atacante->ulti == true) { // Ataque "ULTI"
                    $ataqueTotal = $cantAtaque * 2;
                    
                    $atacante->ulti = false;
                    $atacante->save();
    
                    $victima->life = $cantDefensa - $ataqueTotal;
                    $victima->save();
                }
                else{
                    return response()->json(array(
                        'message' => 'No tiene habilitado el Ataque "Ulti"'
                    ), 207);
                }
    
            } else {
                return response()->json(array(
                    'message' => 'No puede atacar un jugador ya muerto!'
                ), 207);
            }
        }
        else {
            return response()->json(array('Error' => 'Admin no puede atacar'), 207);
        }
    }

    /*
    * Extraccion de Cantidad de Ataque y Defensa de los Usuarios...       
    */
    public function itemAtaque($agresor)
    {
        $itemsA = $agresor->item()->get();
        foreach($itemsA as $i) {
           if ($i->type == 3) {
              $itemAtaque = $i->cant_ataque + 5;
           }
        }
        return $itemAtaque;
    }

    public function itemDefensa($victima)
    {
        $itemsV = $victima->item()->get();
        foreach($itemsV as $i) {
           if ($i->type == 2) {
              $itemDefensa = $i->cant_defensa + 100;
           }
        }
        return $itemDefensa;
    }
}
