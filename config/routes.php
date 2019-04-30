<?php
/**
 * @FILE routes.php
 * Permet d'enregitrer les routes
 */
use Babacar\Router\Exceptions\DuplicateRouteNameException;
//use Router as R pour simplifier l'ecriture
use Babacar\Router\Router as R;

try {
    /**
     * enregistrer les routes
     * nom_du_controller@nom_du_method
     * @example
     * welcome@index => [controller => welcome,method => index]
     */
    R::get('/',"welcome@index",'root');
    R::get('/test',"test@index",'test');
    //le parametre id doit etre un entier
    R::get('/(id<[0-9]>)/(?id2)', "test@getId", 'test.id');
    R::get('/test/list',"test@liste",'test.list');
    /**
     * enregistrer les routes pour l'ajout
     */
    R::get('test/add',"test@add",'test.add');
    R::post('/test/add',"test@add");

    /**
     * enregistrer les routes pour l'edition
     */
    R::get('test/edit/(id<\d+>)',"test@edit",'test.edit');
    //lorseque la methode est de type POST
    R::post('test/update/(id<\d+>)',"test@update",'test.update');
   //lien de suppression
    R::get('test/delete/(id<\d+>)',"test@delete",'test.delete');


    /**
     * enregistrer une routes avec parametre optionel
     * id type entier
     * test2,test1 type chaine
     * opt type mixed optionel
     */
    R::get('test/show/(id<[0-9]+>)/(test1<[a-zA-Z0-9]+>)/(test2<[a-zA-Z0-9]+>)/(?opt)',"test@show",'test.show');




} catch (DuplicateRouteNameException $e) {
    die($e->getMessage());
}


