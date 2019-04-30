
## utilisation
- sans paramètre
``` php
<?php
use Babacar\Router\Router;
//sans paramètre
//Router::get(string $path,mixed $action,?string $name)
//Router::post(string $path,mixed $action,?string $name)

//patch,put,delete pour les utilisateurs de Psr-7 ServerRequestInterface

//Router::put(string $path,mixed $action,?string $name)
//Router::patch(string $path,mixed $action,?string $name)
//Router::delete(string $path,mixed $action,?string $name)


Router::get("/test",function(){
echo 'salut';
},'test');
//null|RouteResult Router::match(mixed $url)
// $url peut être une chaine ou un objet qui implémente ServerRequestInterface

$route= Router::match('/test');
$route->getName();//test
$route->getAction();//callable
$route->getMethode();//GET
$routr->getParameters();//array()
call_user_func_array($route->getAction(),[]);//salut
?>
```
- avec paramètres
``` php 
<?php
use Babacar\Router\Router;

//Router::get(string $path,mixed $action,?string $name)
//même chose que post
//patch,put,delete pour les utilisateurs de Psr-7 ServerRequestInterface

Router::get("/test(name)',function($name){
return 'salut '.$name;
},'test');
//null|RouteResult Router::match(mixed $url)
// $url peut être une chaine ou un objet qui implémente ServerRequestInterface

$route= Router::match('/test/babacar');
$route->getName();//test
$route->getAction();//callable
$route->getMethode();//GET
$routr->getParameters();//array('name'=>'babacar')
call_user_func_array($route->getAction(),$route->getParameters());//salut babacar
//vous pouvez passe plusieur parametres
Router::get('/test/(name1)/(name2)/(name3)',function($name1,$name2,$name3){
   echo "Hello $name1 $name2 $name3";
},'test.name');
$route = Router::match('/test/babacar/mbengue/kroos');
call_user_func_array($route->getAction(),$route->getParameters());//hello babacar mbengue kroos
?>
```
- parametre optionel
 ``` php
  <?php
    Router::get('/test/(?name)',function($name){
    echo "hello $name"
    },'test');
    $route = Router::match('/test');
    $route->getName();//test
    $route->getParameters();//array('name'=>null)
    
    $route = Router::match('/test/babacar');
    $route->getParameters();//array('name'=>'babacar')
  ?>
 ```
