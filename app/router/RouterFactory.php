<?php
/**
 * @author Jan Kotrba <jan.kotrbaa@gmail.com>
 * @date 22:39, 3. 2. 2015
 * @copyright 2015 Jan Kotrba
 */


namespace App;

use Nette,
    Nette\Application\Routers\RouteList,
    Nette\Application\Routers\Route;


/**
 * Router factory.
 */
class RouterFactory
{

    /**
     * @return \Nette\Application\IRouter
     */
    public static function createRouter()
    {
		// Back end


        $router = new RouteList();
        $prefix = "";
        // Admin Router

		$router[] = new Route($prefix . 'admin/teamy[/<action>]', 'Admin:Team:*');
		$router[] = new Route($prefix . 'admin/jednotlivci[/<action>]', 'Admin:Individual:*');
		$router[] = new Route($prefix . 'admin/liga[/<action>]', 'Admin:League:*');
		$router[] = new Route($prefix . 'admin/vysledky[/<action>][/<year>]', 'Admin:Result:*');







        // nastaveni uctu
        $router[] = new Route($prefix . 'admin/muj-ucet/', 'Admin:MyProfile:default');

        // Plugin 'Článek'
        $router[] = new Route($prefix . 'admin/clanek/pridat/[<id>]', 'Admin:ManageArticle:add');

        // Obsah
        $router[] = new Route($prefix . 'admin/obsah/pridat-polozku/', 'Admin:Content:addContent');
        $router[] = new Route($prefix . 'admin/obsah/vsechny-polozky/', 'Admin:Content:allContent');











        // Login
        $router[] = new Route($prefix . 'admin/zapomenute-heslo', 'Admin:Sign:forgot');
        $router[] = new Route($prefix . 'admin/prihlasit-se', 'Admin:Sign:in');

        // Logout
        $router[] = new Route($prefix . 'admin/odhlasit-se', 'Admin:Sign:out');

        // Spravci
        $router[] = new Route($prefix . 'admin/spravci/', 'Admin:Users:list');
        $router[] = new Route($prefix . 'admin/spravci/pridat/', 'Admin:Users:add');
        $router[] = new Route($prefix . 'admin/spravci/upravit/[<userID>]', 'Admin:Users:edit');
        $router[] = new Route($prefix . 'admin/spravci/seznam/', 'Admin:Users:list');

        // Dashboard
        $router[] = new Route($prefix . 'admin/', 'Admin:Dashboard:default');

		// Support
		$router[] = new Route($prefix . 'admin/podpora', 'Admin:Support:contact');






		// Front Router
        $router[] = new Route($prefix . 'roznov-pod-radhostem/', 'Web:Roznov:default');
        $router[] = new Route($prefix . 'valasske-mezirici/', 'Web:Valmez:default');
        $router[] = new Route($prefix . 'bowling/', 'Web:Bowling:default');
        $router[] = new Route($prefix . 'bowling/chci-si-zahrat', 'Web:Bowling:play');
        $router[] = new Route($prefix . 'bowling/bowlingova-liga', 'Web:Bowling:league');
        $router[] = new Route($prefix . '', 'Web:Homepage:default');
        return $router;
    }

}
