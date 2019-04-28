<?php

use Babacar\Router\Exceptions\DuplicateRouteNameException;
use Babacar\Router\Router as R;

try {
    /**
     * enregistrer les routes
     */
    R::get('/',"welcome@index",'root');
    R::get('/test',"test@index",'test');
    R::get('/test/(id<\d+>)', "test@index", 'test.id');
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

    R::post('test/edit/(id<\d+>)',"test@edit");

    R::get('test/delete/(id<\d+>)',"test@delete",'test.delete');


    /**
     * enregistrer une routes avec parametre optionel
     */
    R::get('test/show/(id<[0-9]+>)/(test1<[0-9A-Za-z]+>)/(test2<[0-9A-Za-z]+>)/(?opt)',"test@show",'test.show');




} catch (DuplicateRouteNameException $e) {
    die($e->getMessage());
}


