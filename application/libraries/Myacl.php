<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myacl {

    protected $restrictFunction = array("__construct", "_rules", "_verify", "_loadConfig", "_auth", "_removeRestrictFunction", "_hasAccess", "_generateMenus", "_generateButtons", "_getFunction", "get_instance", "_getModulesName");
    protected $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('auth/Routings_model');
    }

    private function _removeRestrictFunction($functions) {
        $funcs = array_diff($functions, $this->restrictFunction);
        $extFunc = array('_rules', '_action');
        foreach ($extFunc as $sk) {
            foreach ($funcs as $key => $v) {
                if (strpos($v, $sk) !== false) {
                    unset($funcs[$key]);
                }
            }
        }
        return $funcs;
    }

    public function _getFunction($classname) {
        foreach ($this->_getModulesName() as $m => $name) {
            if (file_exists(MODULEPATH . $name . '/controllers/' . $classname . '.php')) {
                include_once MODULEPATH . $name . '/controllers/' . $classname . '.php';
                $methods = get_class_methods(str_replace('.php', '', $classname));
                $funclist = $this->_removeRestrictFunction($methods);
                return array("module" => $name, "class" => $classname, "functions" => $funclist);
            }
        }
    }

    public function _hasAccess($reqUrl, $roles) {

        if (in_array($reqUrl, $roles)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function _generateMenus($roles) {
        $menus = array();
        foreach ($roles as $k => $v) {
            if ($k == 'rolename') {
                continue;
            }
            $url = $this->CI->Routings_model->get_by_routename($k);
            $menu['name'] = $k;
            $menu['alias'] = $url->routealias;
            $menu['icon'] = $url->icon;
            $menu['url'] = base_url($url->routeurl);

            if (is_array($v)) {
                $menu['submenu'] = array();
                foreach ($v as $sm) {
                    $submenu['name'] = $sm;
                    $submenu['url'] = base_url($url->routeurl . '/' . $sm);
                    $menu['submenu'][$sm] = $submenu;
                }
            }
            array_push($menus, $menu);
        }
        return $menus;
    }

    public function _generateButtons($roles) {
        $menus = array();
        foreach ($roles as $k => $v) {
            if ($k == 'rolename') {
                continue;
            }
            $url = $this->CI->Routings_model->get_by_routename($k);
            $menu['name'] = $k;

            if (is_array($v)) {
                $menu['submenu'] = array();
                foreach ($v as $sm) {
                    $submenu['url'] = base_url($url->routeurl . '/' . $sm);
                    $menu['submenu'][$sm] = $submenu;
                }
            }
            array_push($menus, $menu);
        }
        return $menus;
    }

    public function _getModulesName() {
        return array_diff(scandir(APPPATH . '/modules/'), array('.', '..'));
    }

    public function _ModuleExist($module) {
        $modules = $this->_getModulesName();
        if (in_array($module, $modules)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function _functionExist($module, $route, $function) {
        if (file_exists(MODULEPATH . $module . '/controllers/' . $route . '.php')) {
            include_once MODULEPATH . $module . '/controllers/' . $route . '.php';
            $methods = get_class_methods(str_replace('.php', '', $route));
            $funclist = $this->_removeRestrictFunction($methods);
            if (in_array($function, $funclist)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function _btnRead($uri, $id, $text) {
        return ('<a href="' . $uri . '/' . $id . '" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> ' . $text . '</a>');
    }

    public function _btnCreate($uri, $text) {
        return ('<a href="' . $uri . '" class="btn btn-sm btn-danger"><i class="fas fa-pen-square"></i> ' . $text . '</a>');
    }

    public function _btnUpdate($uri, $id, $text) {
        return ('<a href="' . $uri . '/' . $id . '" class="btn btn-sm btn-info"><i class="fas fa-pen"></i> ' . $text . '</a>');
    }

    public function _btnDelete($uri, $id, $text) {
        return ('<a href="' . $uri . '/' . $id . '" class="btn btn-sm btn-warning" onclick="javasciprt: return confirm(\'Anda Yakin Ingin Hapus Data ?\')"><i class="fas fa-trash"></i> ' . $text . '</a>');
    }

    public function _btnDefault($uri, $id, $text, $class = 'btn-default', $icons = "fa-square") {
        return ('<a href="' . $uri . '/' . $id . '" class="btn btn-sm ' . $class . '"><i class="fas ' . $icons . '"></i> ' . $text . '</a>');
    }

    public function _btnBack($uri, $text) {
        return ('<a href="' . $uri . '" class="btn btn-sm btn-default" ><i class="fas fa-arrow-left"></i> ' . $text . '</a>');
    }

    public function _btnCancel($text = "Cancel") {
        return ('<button type="reset" class="btn btn-sm btn-warning" onclick="history.back()">' . $text . '</button>');
    }

    public function _btnSubmit($text = "Submit", $class = "btn-default", $icons = "") {
        return ('<button type="submit" class="btn btn-sm ' . $class . '" ><i class="fas ' . $icons . '"></i> ' . $text . '</button>');
    }

}
