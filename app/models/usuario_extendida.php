<?php

/**
 * KBlog - KumbiaPHP Blog
 * PHP version 5
 * LICENSE
 *
 * This source file is subject to the GNU/GPL that is bundled
 * with this package in the file docs/LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to deivinsontejeda@gmail.com so we can send you a copy immediately.
 *
 * @author Henry Stivens Adarme <henry.stivens@gmail.com>
 */
class UsuarioExtendida extends ActiveRecord {

    public function initialize() {
        //relaciones
        $this->belongs_to('usuario');
        //validaciones
        //TODO Hacer la validaciones
    }
}