<?php
include 'static_data.php';

class Phone{

    private $name;
    private $price;
    private $display;
    private $ram;
    private $rom;
    private $camera;
    private $battery;
    private $processor;
    private $color;
    private $manufacturer;
    private $op_sys;
    private $img;

    public function __set($properties, $val){

        switch($properties){

            case 'Name':
                
                if(!empty($val)) {
                    $this->name = $val;
                    $_SESSION["name"] = true;
                }
                else{
                    $_SESSION["name"] = "Моля въведете валидно име!";
                    throw new Exception("No name found");
                }
                break;

            case 'Price':
                
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && $val>0) {
                    $this->price = $val;
                    $_SESSION["price"] = true;
                }
                else{
                    $_SESSION["price"] = "Моля въведете валиднa цена!";
                    throw new Exception("No price found");
                }
                break;

            case 'Display':
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) ) {
                    $this->display = $val;
                    $_SESSION["display"] = true;
                }
                else{
                    $_SESSION["display"] = "Моля въведете валидно име!";
                    throw new Exception("No display found");
                }
                break;

            case 'Ram':
                global $ram_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$ram_list)) {
                    $this->ram = $val;
                    $_SESSION["ram"] = true;
                }
                else{
                    $_SESSION["ram"] = "Моля въведете валидно име!";
                    throw new Exception("No ram found");
                }
                break;

            case 'Rom':
                global $rom_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$rom_list)) {
                    $this->rom = $val;
                    $_SESSION["rom"] = true;
                }
                else{
                    $_SESSION["rom"] = "Моля въведете валидно име!";
                    throw new Exception("No rom found");
                }
                break;

            case 'Battery':
                
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && $val>=600) {
                    $this->battery = $val;
                    $_SESSION["battery"] = true;
                }
                else{
                    $_SESSION["battery"] = "Моля въведете валидно име!";
                    throw new Exception("No battery found");
                }
                break;
            case 'Processor':
                global $processor_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$processor_list)) {
                    $this->processor = $val;
                    $_SESSION["processor"] = true;
                }
                else{
                    $_SESSION["processor"] = "Моля въведете валидно име!";
                    throw new Exception("No processor found");
                }
                break;

            case 'Color':
                global $color_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$color_list)) {
                    $this->color = $val;
                    $_SESSION["color"] = true;
                }
                else{
                    $_SESSION["color"] = "Моля въведете валидно име!";
                    throw new Exception("No color found");
                }
                break;

            case 'Manufacturer':
                global $man_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && && array_key_exists($val,$man_list)) {
                    $this->manufacturer = $val;
                    $_SESSION["manufacturer"] = true;
                }
                else{
                    $_SESSION["manufacturer"] = "Моля въведете валидно име!";
                    throw new Exception("No manufacturer found");
                }
                break;

            case 'Camera':
                global $camera_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$camera_list)) {
                    $this->camera = $val;
                    $_SESSION["camera"] = true;
                }
                else{
                    $_SESSION["camera"] = "Моля въведете валидно име!";
                    throw new Exception("No camera found");
                }
                break;

            case 'Op_sys':
                global $op_sys_list;
                if(!empty($val) && is_numeric($val) && preg_match('/^[0-9]*/', $val) && array_key_exists($val,$op_sys_list)) {
                    $this->op_sys = $val;
                    $_SESSION["op_sys"] = true;
                }
                else{
                    $_SESSION["op_sys"] = "Моля въведете валидно име!";
                    throw new Exception("No op_sys found");
                }
                break;

            case 'Img':
                
                if(!empty($val)) {
                    $this->img = $val;
                    $_SESSION["img"] = true;
                }
                else{
                    $_SESSION["img"] = "Моля въведете валидно име!";
                    throw new Exception("No img found");
                }
                break;
        }
    }

    public function __get($properties){
        switch($properties){
            case 'Id':
                return $this->id;
                break;

            case 'Name':
                return $this->name;
                break;

            case 'Price':
                return $this->price ;
                break;
                
            case 'Display':
                return $this->display ;
                break; 

            case 'Ram':
                return $this->ram ;
                break;
                
            case 'Rom':
                return $this->rom ;
                break;
                
            case 'Battery':
                return $this->battery ;
                break;
                
            case 'Processor':
                return $this->processor ;
                break;
                
            case 'Color':
                return $this->color ;
                break;
                
            case 'Manufacturer':
                return $this->manufacturer ;
                break;
                
            case 'Camera':
                return $this->camera ;
                break;
                
            case 'Op_sys':
                return $this->op_sys ;
                break;
                
            case 'Img':
                return $this->img;
                break;

            case 'Date':
                return $this->date_created;
                break;
        }

    }
}

?>