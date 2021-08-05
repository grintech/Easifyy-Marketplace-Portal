<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'index', 'home']);
    

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect('/terms-of-service', ['controller' => 'Pages', 'action' => 'termsOfService']);
    
    $routes->connect('/privacy-policy', ['controller' => 'Pages', 'action' => 'privacyPolicy']);

    $routes->connect('/trust-and-safety', ['controller' => 'Pages', 'action' => 'trustAndSafety']);

    $routes->connect('/become-a-user', ['controller' => 'Pages', 'action' => 'becomeAUser']);

    $routes->connect('/become-a-psp', ['controller' => 'Pages', 'action' => 'becomeAPsp']);
    
    $routes->connect('/refer-a-friend', ['controller' => 'Pages', 'action' => 'referAFriend']);
    
    $routes->connect('/faq', ['controller' => 'Pages', 'action' => 'faq']);

    $routes->connect('/serach-service/',['controller'=>'service','action'=>'searchService','services']);

    $routes->connect('/services/',['controller'=>'service','action'=>'index','services']);

    //$routes->connect('/category/:slug',['controller'=>'service','action'=>'serviceCategories','services'])->setPass(['slug']);

    $routes->connect('/services/:slug1',['controller'=>'service','action'=>'serviceProducts','services'])->setPass(['slug1']);

    $routes->connect('/service/:slug1',['controller'=>'service','action'=>'view','services'])->setPass(['slug1']);

    $routes->connect('/blogs/:slug1',['controller'=>'blogs','action'=>'view'])->setPass(['slug1']);

    $routes->connect('/article/:slug1',['controller'=>'articles','action'=>'view'])->setPass(['slug1']);

    $routes->connect('/articles',['controller'=>'articles','action'=>'index']);
    
    $routes->connect('/business-package/:slug1',['controller'=>'business','action'=>'package'])->setPass(['slug1']);


    $routes->connect('/add-blog/',['controller'=>'blogs','action'=>'add']);
    
    $routes->connect('/all-blogs/',['controller'=>'blogs','action'=>'allBlogs']);

    $routes->connect('/service-plan/:slug1',['controller'=>'service','action'=>'service_plan','service_plan'])->setPass(['slug1']);

    $routes->connect('/service-details/:slug1/',['controller'=>'service','action'=>'servicePlanDetail','service_plan'])->setPass(['slug1']);

    $routes->connect('/order/:slug1/:slug2/:slug3',['controller'=>'Order','action'=>'index','order'])->setPass(['slug1', 'slug2','slug3']);

    $routes->connect('/order/add',['controller'=>'Order','action'=>'add','order']);

    $routes->connect('/users/chklogin',['controller'=>'Users','action'=>'chklogin','chklogin']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('superadmin', function (RouteBuilder $routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));
    $routes->applyMiddleware('csrf');
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('admin', function (RouteBuilder $routes) {
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));
    $routes->applyMiddleware('csrf');
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('test', function (RouteBuilder $routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('api', function (RouteBuilder $routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->setExtensions(['json']);
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */