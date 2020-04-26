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
    private $opsys;
    private $img;

    public function __set($properties, $val){

        switch($properties){

            case 'Name':
                
                if(!empty($val)) {
                    $this->name = $val;
                }
                else{
                    throw new Exception("No name found");
                }
                break;

            case 'Price':
                
                if(!empty($val) && is_numeric($val) && $val>0) {
                    $this->price = $val;
                }
                else{
                    throw new Exception("No price found");
                }
                break;

            case 'Display':
                if(!empty($val) && is_numeric($val) ) {
                    $this->display = $val;
                }
                else{
                    throw new Exception("No display found");
                }
                break;

            case 'Ram':
                global $ram_list;
                if(is_numeric($val) && array_key_exists($val,$ram_list)) {
                    $this->ram = $val;
                }
                else{
                    throw new Exception("No ram found");
                }
                break;

            case 'Rom':
                global $rom_list;
                if(is_numeric($val) && array_key_exists($val,$rom_list)) {
                    $this->rom = $val;
                }
                else{
                    throw new Exception("No rom found");
                }
                break;

            case 'Battery':
                
                if(is_numeric($val) && $val>=600) {
                    $this->battery = $val;
                }
                else{
                    throw new Exception("No battery found");
                }
                break;
            case 'Processor':
                global $processor_list;
                if(is_numeric($val) && array_key_exists($val,$processor_list)) {
                    $this->processor = $val;
                }
                else{
                    throw new Exception("No processor found");
                }
                break;

            case 'Color':
                global $color_list;
                if(is_numeric($val) && array_key_exists($val,$color_list)) {
                    $this->color = $val;
                }
                else{
                    throw new Exception("No color found");
                }
                break;

            case 'Manufacturer':
                global $man_list;
                if(is_numeric($val) && array_key_exists($val,$man_list)) {
                    $this->manufacturer = $val;
                }
                else{
                    throw new Exception("No manufacturer found");
                }
                break;

            case 'Camera':
                global $camera_list;
                if(is_numeric($val) && array_key_exists($val,$camera_list)) {
                    $this->camera = $val;
                }
                else{
                    throw new Exception("No camera found");
                }
                break;

            case 'Opsys':
                global $opsys_list;
                if(is_numeric($val) && array_key_exists($val,$opsys_list)) {
                    $this->opsys = $val;
                }
                else{
                    throw new Exception("No opsys found");
                }
                break;

            case 'Img':
                
                if(!empty($val)) {
                    $this->img = $val;
                }
                else{
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
                
            case 'Opsys':
                return $this->opsys ;
                break;
                
            case 'Img':
                return $this->img;
                break;
        }

    }


    public function getProp($properties){
        switch(ucfirst($properties)){
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
                
            case 'Opsys':
                return $this->opsys ;
                break;
                
            case 'Img':
                return $this->img;
                break;
        }

    }

    function addPhone()
    {       
        $msg = '';
        $db = mysqli_connect('localhost','root','','phone_shop') or die('Could not connect to Database');


        $query = "INSERT INTO phone (`name`,`price`,`display`,`ram`,`rom`,`camera`,`battery`,`processor`,`color`,`opsys`,`manufacturer`) 
        VALUES('$this->name',$this->price,$this->display,$this->ram,$this->rom,$this->camera,$this->battery,$this->processor,$this->color,$this->opsys,$this->manufacturer)"; //$this->img

        $res = mysqli_query($db,$query);
        $msg = 'Успешно добавихте <b>'.$this->name.'</b>!';

        return $msg;

        // echo "<pre>" . print_r($this->name, true) . "</pre>";
        // echo "<pre>" . print_r($this->price, true) . "</pre>";
        // echo "<pre>" . print_r($this->display, true) . "</pre>";
        // echo "<pre>" . print_r($this->ram, true) . "</pre>";
        // echo "<pre>" . print_r($this->rom, true) . "</pre>";
        // echo "<pre>" . print_r($this->camera, true) . "</pre>";
        // echo "<pre>" . print_r($this->battery, true) . "</pre>";
        // echo "<pre>" . print_r($this->processor, true) . "</pre>";
        // echo "<pre>" . print_r($this->color, true) . "</pre>";
        // echo "<pre>" . print_r($this->opsys, true) . "</pre>";
        // echo "<pre>" . print_r($this->manufacturer, true) . "</pre>";

    }
}

?>