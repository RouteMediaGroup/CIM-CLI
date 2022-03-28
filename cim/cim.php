<?php
namespace Cimply;
require_once('C:\inetpub\wwwroot\procesa\vendor\autoload.php');
$app = (new Console([__DIR__]))->app('Console');
use Cimply\Service\Api\Http;
if(CLI::Console($_SERVER['argv'], $app)) {
    Core\View\View::Assign([
        'Title' => 'PHP CIM-CLI',
        'Keywords' => 'CimplyWork, FrameWork',
        'Description' => 'CimplyWork - Amplify Your Business.',
        'Copyright' => 'RouteMedia',
        'Jahr' => date("Y")
    ]);
    $app->route('init/import', function() use ($app) {
        $app->action('\Cim\NewInstance::Init');
        if(is_file("..\\frontend\\package.json")) {
            $app = null;
        }
        return $app;
    })->route('create/module', function() use ($app) {
        $app->action('\Cim\Modules\CreateModule::Init');
        return $app;
    })->route('create/controller', function() use($app) {
        $app->action('\Cim\Modules\CreateEntity::Init');
        return $app;
    })->route('create/entity', function() use($app) {
        $app->action('\Cim\Modules\CreateEntity::Init');
        return $app;
    })->route('init/project', function() use($app) {
        $app->action('\Cim\Modules\InitModel::Init');
        return $app;
    })->route('build/project', function() use($app) {
        $app->action('\Cim\Modules\BuildProject::Init');
        return $app;
    })->route('run/project', function() use($app) {
        $app->action('\Cim\Modules\RunProject::Init');
        return $app;
    })->route('update/project', function() use($app) {
        $app->action('\Cim\Modules\UpdateProject::Init');
        return $app;
    })->route('clear/cache', function() use ($app) {
        $app->action('\Cim\Modules\CacheCtrl::Init');
        return $app;
    })->route('import/data', function() use ($app) {
        $data = Http::Request('sjrprodweb1.beresa.de/GoImport/SplitCsv');
        die(var_dump($data));
    })->route('settings', function() use ($app) {
        print("Dieser Bereich befindet sich noch in Arbeit\n\r");
        die();
    });
} else {
    die('access denied.');
}
$app->execute();