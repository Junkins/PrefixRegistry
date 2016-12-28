<?php
namespace PrefixRegistry\View;

use Cake\Core\App;
use Cake\View\HelperRegistry;
use Cake\View\View;

class PrefixHelperRegistry extends HelperRegistry
{
    /**
     * $prefix
     */
    private $prefix = '';

    /**
     * __construct
     * @author ito
     */
    public function __construct(View $View = null)
    {
        parent::__construct($View);
        $this->prefix = $this->getPrefix($View);
    }

    /**
     * getPrefix
     * @author ito
     */
    protected function getPrefix(View $View)
    {
        $namespace = get_class($View);
        preg_match('/View\\\(.*)\\\/', $namespace, $matches);
        return (isset($matches[1]))? $matches[1] : '';
    }

    /**
     * _resolveClassNam
     * @author ito
     */
    protected function _resolveClassName($class)
    {
        $classObject = App::className($class, 'View/Helper/' . $this->prefix, 'Helper');
        return ($classObject)?$classObject:App::className($class, 'View/Helper', 'Helper');
    }
}
