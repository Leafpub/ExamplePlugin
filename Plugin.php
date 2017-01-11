<?php
/**
 * Leafpub: Simple, beautiful publishing. (https://leafpub.org)
 *
 * @link      https://github.com/Leafpub/leafpub
 * @copyright Copyright (c) 2016 Leafpub Team
 * @license   https://github.com/Leafpub/leafpub/blob/master/LICENSE.md (GPL License)
 */

namespace Leafpub\Plugins\ExamplePlugin;

use Leafpub\Leafpub,
    Leafpub\Plugin\APlugin,
    Leafpub\Events\Application\Startup;

class Plugin extends APlugin {
    /* If we overwrite __construct we MUST call parent::__construct
    public function __construct($app){
        parent::__construct($app);
        $this->listenTo();
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
