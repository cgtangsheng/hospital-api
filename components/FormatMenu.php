<?php

namespace app\components;

class FormatMenu
{
    private $treeData    = array();
    private $treeNode    = array();
    private $urlNode     = array();
    private $userRoleArr = array();

    public function getAssignMenuFromCache()
    {
        $menuCache = $this->formatAssignMenu();
        return $menuCache;
    }

    public function formatAssignMenu()
    {
        $menus = require(\Yii::getAlias('@app/config/menus').'.php');
        return $menus;
    }

    /**
     * zhangtao
     * 找出树的所有叶子节点
     */
    private function TreeSubNode($node) {
        foreach ($this->treeData as $key => $value) {
            foreach ($value as $k => $v) {
                $this->i++;                
                if($node == $k){
                    if(in_array($v, $this->userRoleArr)) continue;
                    $this->userRoleArr[] = $k;
                    $this->treeNode[]   = $v;
                    $this->TreeSubNode($v);
                }
            }
        }
    }

    private function formatParams() {
        foreach (array_unique($this->treeNode) as $t) {
            $this->urlNode[] = "\/" . str_replace(array('.*', '.'), array('', '\/'), $t);
        }
    }

    private function isAssign($str) {
        foreach ($this->urlNode as $task) {
            if (preg_match("/^{$task}[\.|\/]/i", $str) or preg_match("/^{$task}$/i", $str)) {
                return true;
            }
        }
    }

    /**
     * 当前菜单与目标菜单是否匹配
     * @author zhangjin <jin.zhang@xiaomi.com>
     * @param  string $current
     * @param  string $target
     * @return boolean
     */
    private function _isMenuMatch($current, $target) {
        $curt = preg_split('/\s*\/\s*/', trim($current), -1, PREG_SPLIT_NO_EMPTY);
        $tagt = preg_split('/\s*\/\s*/', trim($target), -1, PREG_SPLIT_NO_EMPTY);

        if (count($curt) > 2
            && count($tagt) > 2
            && $curt[0] . $curt[1] . $curt[2] == $tagt[0] . $tagt[1] . $tagt[2]) {
            return true;
        }
    }

    /**
     * 当前菜单是否激活
     * @author zhangjin <jin.zhang@xiaomi.com>
     * @param  string $curtRoute
     * @param  string $tagtRoute
     * @return boolean
     */
    public static function isTabActive($curtRoute, $tagtRoute) {
        if ("/" . $tagtRoute == $curtRoute)
            return true;
        elseif ($tagtRoute == $curtRoute)
            return true;
        else {
            $p = preg_split('/\s*\/\s*/', trim($tagtRoute), -1, PREG_SPLIT_NO_EMPTY);

            if (count($p) > 2 && "/{$p[0]}/{$p[1]}/{$p[2]}" == $curtRoute) {
                return true;
            }
        }

        return false;
    }

    /**
     * 根据权限递归过滤用户菜单
     * @author zhangjin <jin.zhang@xiaomi.com>
     * @param  array $menus
     * @return mixed
     */
    private function _filterRights($menus) {
        if (!is_array($menus))
            return $menus;

        $menuFilter = array();
        foreach ($menus as $name => $route) {
            if (is_array($route)) {
                $menuSub = $this->_filterRights($route);
                if (!empty($menuSub)) {
                    $menuFilter[$name] = $this->_filterRights($route);
                }
            } elseif ($this->isAssign($route)) {
                $menuFilter[$name] = $route;
            }
        }

        return $menuFilter;
    }

}
