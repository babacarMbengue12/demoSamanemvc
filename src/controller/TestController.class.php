<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/ 
    use libs\system\Controller; 

    use src\model\TestDB;
    use src\model\TestModel;
    class TestController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
            /**
             * Appel du model grace au systeme autoloading
             */
        }

        /**
         * A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
         *Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
         */

        public function index()
        {

            return $this->view->load("test/index");
        }

        public function getId($id,$id2)
        {
            $data['ID'] = $id;
            $data['ID2'] = $id2;

            return $this->view->load("test/get_id", $data);
        }

        public function get($id)
        {
            $tdb = new TestModel();

            $data['test'] = $tdb->getTest($id);

            return $this->view->load("test/get", $data);
        }

        public function liste()
        {
            $tdb = new TestModel();

            $data['tests'] = $tdb->listeTest();
            return $this->view->load("test/liste", $data);
        }


        public function add()
        {
            $tdb = new TestModel();
            if (isset($_POST['valider'])) {
                extract($_POST);
                $data['ok'] = 0;
                if (!empty($valeur1) && !empty($valeur2)) {

                    $testObject = new Test();

                    $testObject->setValeur1(addslashes($valeur1));
                    $testObject->setValeur2(addslashes($valeur2));

                    $ok = $tdb->addTest($testObject);
                    $data['ok'] = $ok;
                }
                return $this->view->load("test/add", $data);
            } else {
                return $this->view->load("test/add");
            }
        }

        public function update()
        {
            $tdb = new TestModel();
            if (isset($_POST['modifier'])) {
                extract($_POST);
                if (!empty($id) && !empty($valeur1) && !empty($valeur2)) {
                    $testObject = new Test();
                    $testObject->setId($id);
                    $testObject->setValeur1($valeur1);
                    $testObject->setValeur2($valeur2);
                    $ok = $tdb->updateTest($testObject);
                }
            }

            return $this->liste();
        }

        /**
         * @param $id
         * @param $test1
         * @param $test2
         * @return bool
         */
        public function show(int $id,string $test1,string $test2,$opt)
        {
            return $this->load('test/show',compact('test1','id','test2','opt'));
        }
        public function delete($id){
            /** 
             * Instanciation du model
             */
            $tdb = new TestModel();
			/** 
             * Supression
             **/
			$tdb->deleteTest($id);
			/** 
             * Retour vers la liste
             */
            return $this->liste();
        }
		
		public function edit($id){
			
            /** 
             * Instanciation du model
             */
            $tdb = new TestModel();
			/**
             *Supression
             */
            $data['test'] = $tdb->getTest($id);
            var_dump($tdb->getTest($id));
            /** 
             * chargement de la vue edit.html
             */
            return $this->view->load("test/edit", $data);
        }
    }
?>