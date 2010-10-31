<?php

require_once CORE_PATH . 'libs/acl2/adapters/simple_acl.php';

class MyAcl extends SimpleAcl {

    protected $_roles = array(
        'administrador' => array('articulo', 'create'),
        'administrador' => array('articulo', 'edit')
    );

    protected function _getUserRoles($user) {       
        $roles = array();

        /*$Rol = Load::model('rol');
        foreach ($Rol->find_all_by_usuario($user) as $rol) {
            $roles[] = $rol->rol;
        }*/

        return $roles;
    }

}

?>