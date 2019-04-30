<?php
/**
 * Created by PhpStorm.
 * User: Babacar Mbengue
 * Date: 28/04/2019
 * Time: 09:35
 */

namespace Babacar\Router;


class Generator
{
    private static $_instance;
    public static function getInstance()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new self();
        }
        return self::$_instance;

    }
    /**
     * @param string $name
     * @param array  $prams
     * @param array  $queryArgs
     * @return mixed
     * @throws Exceptions\RouteNotFoundException
     * @throws Exceptions\RouteParameterNameException
     * @throws Exceptions\RouteParameterNotMatchException
     * @throws Exceptions\RouteParametersMissingException
     */
    public static function url(string $name, array $prams = [], array $queryArgs = [])
    {

        $url =Router::generateUri($name,$prams,$queryArgs);

         $baseUrl = base_url();
         $baseUrl = substr($baseUrl,0,-1);

        return $baseUrl.str_replace('//','/',$url);
    }

}