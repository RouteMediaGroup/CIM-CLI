<?php
/**
 * Description of MainCtrl
 *
 * @author Michael Eckebrecht
 */

declare(strict_types=1);
namespace App {
    use \Cimply\Core\View\{View};
    use \Cimply\App\Settings;
    class MainCtrl extends \Cimply\Service\Cli\Base
    {
        protected static $app, $currentSelect = null;
        /**
         *
         * @Author Michael Eckebrecht
         * @Menu 1: Create Module | 2: Create Controller | 3: Create Entity 
         * @Options1 4: Init Project | 5: Run Project | 6: Build Project | 7: Update Project
         * @Options2 8: Settings | 9: Clear Cache | 10: Help | 11: Exit
         * @Options3 12: Import Data
         * @Execute "Please enter your Choice?"
         *
         */
        final static function Init($app = null, $menu = true): void {
            if($menu) {
                print "\n\r";
                print View::ParseTplVars("[+Title+]");
                print "\n\r";
                print "--------------------------------------------------------------------------------";
                print "\n\r";
                print View::ParseTplVars("[+Menu+]");
                print "\n\r";
                print View::ParseTplVars("[+Options1+]");
                print "\n\r";
                print View::ParseTplVars("[+Options2+]");
                print "\n\r";
                print View::ParseTplVars("[+Options3+]");
                print "\n\r";
                print "--------------------------------------------------------------------------------";
                print "\n\r";
                print(self::GetSession('Project') != '' ? '@'.self::GetSession('Project').':' : '');
                print(View::ParseTplVars("[+Execute+]"). " ");
            }
            self::MainMenu(parent::GetMessage());
        }

        private static function MainMenu($select = '1') {
            $close = false;
            $goto = null;
            switch(self::$currentSelect ?? $select) {
                case 1:
                case 'create module':
                    $goto = 'create module';
                    break;
                case 2:
                case 'create controller':
                    $goto = 'create controller';
                    break;
                case 3:
                case 'create entity':
                    $goto = 'create entity';
                    break;
                case 4:
                case 'init project':
                    $goto = 'init project';
                    break;
                case 5:
                case 'run project':
                    $goto = 'run project';
                    break;
                case 6:
                case 'build project':
                    $goto = 'build project';
                    break;
                case 7:
                case 'update project':
                    $goto = 'update project';
                    break;
                case 8:
                case 'Settings':
                    $goto = 'settings';
                    break;
                case 9:
                case 'clear cache':
                    self::ClearSession('Project');
                    print('clear cache success.');
                    break;
                case 10:
                case 'help':
                    print(passthru("CHOICE /?"));
                    print "\n\r";
                    break;
                case 11:
                case 'import data':
                    $goto = 'import data';
                    break;
                    break;
                case 12:
                case 'exit':
                    $close = true;
                    break;
                default:
                    print("invalid value - try again: ");
                    self::Init(self::$app, false);
            }
            ($close !== true) ? passthru('.\cim.bat '.$goto) : die(passthru("EXIT"));
            self::Init();
        }
    }
}