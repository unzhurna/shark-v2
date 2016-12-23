<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    public function view_admin($view, $vars = array(), $return = FALSE)
    {
        $CI =& get_instance();
        $the_theme 	= 'admin/';
        return $this->_ci_load(array('_ci_view' => $the_theme.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }

    public function view_public($view, $vars = array(), $return = FALSE)
    {
        $CI =& get_instance();
        $the_theme 	= 'shark/';
        $set_theme  = (!file_exists(VIEWPATH.$the_theme.'index.php')) ? 'shark/' : $the_theme;
        return $this->_ci_load(array('_ci_view' => $set_theme.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }

}
