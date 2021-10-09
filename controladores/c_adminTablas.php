<?php

class ControladorRegistroAdmin

{


    static public function consultarTodoRegBD($tabla)
    {
        
        $respuesta = ModeloRegistroAdmin::mdlConsultarTodosRegBD($tabla);
        return $respuesta;
	}

}
?>