<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
namespace libs\system;
use Babacar\Router\Router;
use Babacar\Router\RouteResult;

class Bootstrap{
        public function __construct(){
            /**
             * pour initialiser et enregistrer les routes
             */
            require_once __DIR__.'/../../config/routes.php';
            $model = new Model();
            /**
             * si $_GET['url'] n'est pas definit on est a la racine
             */
            $url = $_GET['url'] ?? '/';
			$error = new SM_Error();
            /**
             * @var $route|null RouteResult
             * analiser l'url
             */
            $route = Router::match($url);

            /**
             * si l'url match
             */
			if(!is_null($route)){

                /**
                 * on a [0 => nom_du_controller,1=>nom_du_method]
                 */
				$url = explode('@',$route->getAction());

                $file = 'src/controller/' . $url[0] . 'Controller.class.php';
                $controllerObject = $url[0]."Controller";

				if(file_exists($file)){
					require_once $file;
					
					$controller = new $controllerObject();
                    //si la methode est saisie
                    if(isset($url[1])){
                        if($url[1] == ""){
                            $url[1] = "index";
                        }
                        if(method_exists($controller, $url[1])){
							require_once "PHP_DB_Connection.lib.class.php";
                            /**
                             * Pour appeler la methode et les passer les parameters
                             */
                            call_user_func_array([$controller,$url[1]],$route->getParameters());
                        }else{
                            $msg = "La méthode <b>".$url[1]."()</b> n'existe pas dans le controller <b>".$url[0]."</b>!";
							$error->messageError($msg);
                        }
                    }else{
						if(method_exists($controller, "index")){
							$controller->{"index"}();
						}else{
							$msg = "La méthode <b>index()</b> n'existe pas dans le controller <b>".$url[0]."</b>!";
							$error->messageError($msg);
						}
					}
                }else{
                    $msg = "Le controller <b>" . $controllerObject . "</b> n'existe pas !";
					$error->messageError($msg);
                }

            }else{

                $file = 'src/controller/'.welcome_params()['welcome_controller'].'.class.php';
				if(file_exists($file))
				{
					require_once $file;
					$controller = welcome_params()['welcome_controller'];
					$controller = new $controller();
				
					if(method_exists($controller, "index")){
						$controller->{"index"}();
					}else{
						$msg = "La methode <b>index()</b> n'existe pas dans le controller <b>".welcome_params()['welcome_controller']."</b>!";
						$error->messageError($msg);
					}
                    
				}else{
					$msg = "Le controller welcome <b>" . welcome_params()['welcome_controller'] . "</b> n'existe pas !";
					$msg = $msg. "<br/>Merci de bien faire la configuration du fichier <b>config/welcome_controller.php</b>!";
					$error->messageError($msg);
				}
            }
        }
		
    }
?>