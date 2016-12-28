# PrefixRegistry

## Introduction
You can lay Components and Helpers hierarchically.

## Setup
Components
```php
<?php
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use PrefixRegistry\Controller\PrefixComponentRegistry;

class AppController extends Controller
{

    /**
     * initialize
     */
    public function initialize()
    {
        parent::initialize();
        // you can use Components definded on
        // '/src/Controller/Component/Admin/*' OR '/src/Controller/Component/*'.
        $this->_components = new PrefixComponentRegistry($this);
    }
}
```

Helpers
```php
<?php
namespace App\View\Admin;

use Cake\View\View;
use PrefixRegistry\Controller\PrefixComponentRegistry;

class AdminView extends View
{
     public function initialize()
     {
         parent::initialize();
         // you can use Helpers definded on
         // '/src/View/Helper/Admin/*' OR '/src/View/Helper/*'.
         $this->_helpers = new PrefixHelperRegistry($this);
     }
}
```
