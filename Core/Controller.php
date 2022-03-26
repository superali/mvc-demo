<?php
namespace Core;


abstract class Controller 
{
    /**
     * Parameters from route
     * @var array
     */
    protected $route_params;
    /**
     * class constuctor 
     * @param array $route_params
     * @return void
     */

     public function __construct($route_params)
     {
         $this->route_params=$route_params;
     }

     public function __call($name,$args){
         $method = $name.'Action';
         if(method_exists($this,$method)){
             if($this->before() !== false){
                 call_user_func_array([$this,$method],$args);
                 $this->after();
                }
         }else{
             echo "Method $method not found in controller ".get_class($this);
         }
     }

     protected before(){}
     protected after(){}

}