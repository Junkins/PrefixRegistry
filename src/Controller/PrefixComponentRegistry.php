<?php
namespace PrefixRegistry\Controller;

use Cake\Core\App;
use Cake\Controller\Controller;
use Cake\Controller\ComponentRegistry;

class PrefixComponentRegistry extends ComponentRegistry
{
    /**
     * $prefix
     */
    private $prefix = '';

    /**
     * __construct
     * @author ito
     */
    public function __construct(Controller $controller = null)
    {
        parent::__construct($controller);
        $this->prefix = $this->getPrefix($controller);
    }

    /**
     * getPrefix
     * @author ito
     */
    protected function getPrefix(Controller $controller)
    {
        $namespace = get_class($controller);
        preg_match('/Controller\\\(.*)\\\/', $namespace, $matches);
        return (isset($matches[1]))? $matches[1] : '';
    }

    /**
     * _resolveClassName
     * @author ito
     */
    protected function _resolveClassName($class)
    {
        $classObject = App::className($class, 'Controller/Component/' . $this->prefix, 'Component');
        return ($classObject) ? $classObject : App::className($class, 'Controller/Component', 'Component');
    }
}
