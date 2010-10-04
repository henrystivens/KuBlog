<?php

Load::models('usuario', 'usuario_extendida');

class UsuarioController extends ApplicationController {

    public function index() {

    }

    /**
     * Muestra la información del usuario, es consultado
     * a traves de sus nombre de usuario(login)
     */
    public function perfil($login=null) {
        if ($login) {
            $usuario = new Usuario();
            if (!$this->usuario = $usuario->find_first("login='$login'")) {
                Flash::warning("No existe un usuario con este nombre de usuario: $login");
            } else {
                //Consulta la información extendida del usuario
                $extendida = new UsuarioExtendida();
                $this->extendida = $extendida->find("usuario_id = $usuario->id");
            }
        } else {
            Flash::warning("No ha usuado un nombre de usuario valido");
        }
    }

    /**
     * Edita la información básica y extendida del usario.
     */
    public function edit() {
        if ($id = Auth::get('id')) {
            $usuario = new Usuario();
            $usuario_extendida = new UsuarioExtendida();

            $this->usuario = $usuario->find($id);
            $this->user_extend = $usuario_extendida->find_by_usuario_id($this->usuario->id);
        }
    }

    /**
     * Iniciar sesion para los invitados
     */
    public function login() {
        Load::lib('SdAuth');
        if (!SdAuth::isLogged()) {
            if (SdAuth::getError()) {
                Flash::error(SdAuth::getError());
            }
            return false;
        } else {
            $usuario = new Usuario();
            Router::redirect('usuario/' . $usuario->getUserLogged()->login);
        }
    }

}

?>