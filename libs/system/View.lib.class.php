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
use Babacar\Router\Generator;
use Babacar\Router\Router;

class View{
		private $tpl;
        public function __construct(){
            require_once "SM_Sarty.lib.class.php";
			$this->tpl = getSmarty();
        }
        public function load(){
            $num = func_num_args();
            $args = func_get_args();
            switch($num){
                case 1:
                    $this->chargerDonnees($args[0]);
                    break;
                case 2:
                    $this->chargerDonnees($args[0], $args[1]);
                    break;
            }
        }
		
        private function chargerDonnees($page, $data = array()){
            $page_directory = 'src/view/' . $page . '.html';
            $data['url_base'] = base_url();
            $this->tpl->assign($data);

            $this->tpl->registerClass('Helper',Generator::class);
//            $this->tpl->assignGlobal('helper',Generator::getInstance());
            if(file_exists($page_directory))
            {
    			$this->tpl->display($page_directory);
            }else{

                $message = "la view <b>".$page_directory."</b> n'existe pas!!!!";
                $error = new SM_Error();
                $error->messageError($message);
            }
        }
        
        
    }
?>