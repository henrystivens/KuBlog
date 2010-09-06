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
 * @author Deivinson Tejeda <deivinsontejeda@gmail.com>
 */
/**
 * Carga de Modelos
 */
Load::models('categoria');
/**
 * Gestiona la parte administrativa de las noticias
 */
class CategoriaController extends ApplicationController {

    /**
     * Lista los categorias
     * @param $page
     * @return Paginate
     */
    public function index ($page = 1) {
        $this->pageTitle = 'Lista de categorias';
        $categoria = new Categoria();
        $this->listPosts = $categoria->getAllPost($page);
    }
    /**
     * Edita una categoria
     * @param $id
     * @return ResultSet
     */
    public function edit ($id = NULL) {
        $categoria = new Categoria();
        if($id != NULL){
    	    //Aplicando la autocarga de objeto, para comenzar la edición
            $this->categoria = $categoria->find($id);
    	}
        if(Input::hasPost('categoria')){

            if(!$categoria->update(Input::post('categoria'))){
                Flash::error('Falló Operación');
            } else {                
                return Router::redirect('admin/categoria/');
            }
        }
    }
    
    /**
     * Crea una nueva categoria
     *
     */
    public function create () {
        if (Input::hasPost('categoria')) {
            if($categoria = Categoria::input('create', Input::post('categoria'))) {
                return Router::redirect('admin/categoria/');
            }
        }

        $this->usuario_id = Auth::get('id');
        //$this->autor = Auth::get('nombre');
    }
    /**
     * Eliminar una categoria
     *
     * @param int $id
     */
    public function del ($id = null) {
        View::select(NULL);
        if ($id) {
            $categoria = new Categoria();
            $categoria->del($id);
        }
        return Router::redirect('admin/categoria/');
    }
    /**
     * Corriendo filtro
     *
     */
    public function before_filter () {
        if (Input::isAjax()) {
            View::response('view');
        }
    }
}
