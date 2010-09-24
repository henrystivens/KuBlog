<?php

Load::model('usuario');

class UsuarioController extends ApplicationController {

    public function index() {

    }

    /*
     * Muestra la información del usuario, es consultado
     * a traves de sus nombre de usuario(login)
     */
    public function ver($login=null) {
        if ($login) {
            $usuario = new Usuario();
            if(!$this->usuario = $usuario->find_first("login='$login'")){
                Flash::warning("No existe un usuario con este nombre de usuario: $login");
            }
        }else{
            Flash::warning("No ha usuado un nombre de usuario valido");
        }
    }
}

?>