<?php
class LegajosController extends BaseController {    
    public function getBuscar(){
        return View::make('legajos.buscar');
    }    
    public function postBuscar(){
        $empleados = array(
            array(
                'legajo' => '123',
                'nombre' => 'Cornelio',
                'apellido' => 'Del Rancho',
                'area' => 'Programación'
            ),
            array(
                'legajo' => '456',
                'nombre' => 'Modesto',
                'apellido' => 'Rosado',
                'area' => 'Recursos humanos'
            ),
            array(
                'legajo' => '789',
                'nombre' => 'Humberto',
                'apellido' => 'Vélez',
                'area' => 'Seguridad'
            )
        );
        $legajo = Input::get('legajo');
        foreach($empleados as $item){
            if($item['legajo'] == $legajo){
                return Response::json($item);
            }
        }
        return 0;
    }
}
?>