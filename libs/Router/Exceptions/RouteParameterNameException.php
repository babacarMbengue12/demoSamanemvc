<?php
/**
 * Created by PhpStorm.
 * User: Babacar Mbengue
 * Date: 01/04/2019
 * Time: 19:52
 */

namespace Babacar\Router\Exceptions;


use Throwable;

class RouteParameterNameException extends RouteException
{
   public function __construct($parameter1,$parameter2, int $code = 0, Throwable $previous = null)
   {
       parent::__construct("Le parametre $parameter1 doit etre $parameter2", $code, $previous);
   }
}