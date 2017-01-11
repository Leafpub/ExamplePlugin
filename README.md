# <img src="https://leafpub.org/content/uploads/2016/11/leafpub-logo-1.png" alt="Leafpub" width="300">

# ExamplePlugin

A Leafpub plugin uses a plugin.json which holds information about the plugin and a Plugin.php, the entry point.

### plugin.json

```json
{
    "name": "Hello World",
    "description": "Hello World Plugin",
    "version": "1.0.0",
    "requires": "1.0.0",
    "author": "Marc",
    "license": "GPLv3",
    "link": "https://www.leafpub.org/",
    "isAdminPlugin": true,
    "isMiddleware": false,
    "image": "",
    "routes": [
        {
            "method": "GET",
            "uri": "/test",
            "cb": "Leafpub\\Plugins\\ExamplePlugin\\Plugin::say"
        }
    ]
}
``` 

#### Notes

- name: The name of the plugin
- description: A short description of the plugin
- version: plugin version
- requires: min. Leafpub version.
- author: name of the plugin author
- license: license of the plugin
- link: link to repo or website
- isAdminPlugin: Does the plugin extend the backend and the user needs to login?
- isMiddleware: should the plugin used as Slim Middleware?
- image: a logo or a preview picture
- routes: a optional array of routes

### Plugin.php

```php

namespace Leafpub\Plugins\ExamplePlugin;

use Leafpub\Leafpub, //optional
    Leafpub\Plugin\APlugin,
    Leafpub\Events\Application\Startup; //optional

class Plugin extends APlugin {
    /* Overwriting the standarnd constructor is optional
    public function __construct($app){
        parent::__construct($app);   
        //$this->listenTo();
    }
    */
    private function listenTo(){
        Leafpub::on(Startup::NAME, function($evt){
            echo('Hello World');
        });
    }

    public static function say(){
        die("Say hello");
    }
}
```

#### Notes

- a Plugin MUST use the namespace `Leafpub\Plugins\`.
- a Plugin MUST extend the abstract class `Leafpub\Plugin\APlugin`
- a Plugin can listen/subscribe to Leafpub Events via Leafpub::on()
- if a Plugin will be used as middleware, it MUST implement/overwrite the `__invoke($req, $res, $next)` function
