<?php //https://runestone.academy/runestone/static/pythoned/Trees/ImplementacionArbolBusqueda.html
class NodoBinario {
    private $valor;//privados, getter y setter valor diferente de nulo y entero o float
    private $grado;//en caso de que no que sea 0 jejeje
    private $nivel;//en este caso deben ser validados que sean nodos o nulos
    private $izq;
    private $der;
    private $padre;
    //
    public function NodoBinario($valor, $izq=null, $der=null, $padre=null){
        $this->valor = $valor; //diferente de nulo y entero, mandar thow exception o convertirlo a 0 
        $this->izq = $this->setIzquierdo($izq); //pasarlo a getter para que el lo valide
        $this->der = $this->setDerecho($der);
        $this->padre = $this->setPadre($padre);
//        if($izq != null && is_a($izq, 'NodoBinario')){
//            $this->sig = $sig; 
//        }
        
    }
    //
    public function setValor($valor){
        if($valor != null){
            $valor = floatval($valor); //<--- primero operacion derecha
            $this->valor = $valor;
        }
    }
    public function getValor(){
        return $this->valor;
    }
    //
    public function setGrado($grado){
        if (is_int($grado) && ($grado>=0 && $grado <=2 )) {
            $this->grado=$grado;
        }
        else{
            //no es posible
        }
    }
    public function getGrado(){
        return $this->grado;
    }
    //
    public function setNivel($nivel){
        if (is_int($nivel)&& $nivel >= 0) {
            $this->nivel=$nivel;
        }
    }
    public function getNivel(){
        if($this->padre != null){
            return $this->padre->nivel()+1;
        } 
        return 0;
    }
    // 
    public function setPadre($padre){
        if($padre == null && $this->padre!= null){                 //en caso de que quiera matar a mi padre, verifica que efectivaente tenga uno.
            if($this->valor > $this->padre->getValor()){                //si mi valor es mayor que el de mi padre
                $this->padre->der=null;                            //yo soy derecho por lo tanto le pido que me suelte
            }else{
                $this->padre->izq=null;                            //sino solo puedo ser el izquierdo en este caso igual le pido que me suelte 
            }
            $this->padre=null;                                     //solo cuando ya me soltó me puedo soltar de el ( de lo contrario no podría pedirle que me suelte)
        } else if(is_a ($padre, 'NodoBinario' )){                  //En este otro caso voy a adoptar un padre, verifico si efectivamente es un nodo 
            if ($padre->getValor() > $this->valor) {                    //si el valor de mi padre es mayor que el de mio 
                $padre->izq=$this;                               //debo ir a la izquierda, le pido que me tome
                $this->padre = $padre;                             //y para terminar yo lo tomo a el
            }else{
                $padre->der=$this;
                $this->padre = $padre;
            }
            
        } else{/*pos nada...error, supongo*/ }
    }
    public function getPadre(){
        return $this->padre;
    }
    
    public function setIzquierdo($hijo){
        if(is_a ($hijo, 'NodoBinario' )){               //verifico que efectivamente sea un nodo
            $this->izq=$hijo;                           //ahora el nodo es mi hijo
            $hijo->padre=$this;                     //y hago que me reconozca como tal
        }
        if ($hijo==null && $this->izq != null) {        //si quiero matar a mi hijo, verifico que tengo hijo
            $this->izq->padre=null;                 //me aseguro que mi hijo me suelte
            $this->izq= null;                           //y luego yo lo suelto a el
        }
    }
    public function getIzquierdo(){
        return $this->izq;
    }
    
    public function setDerecho($hijo){
        if(is_a ($hijo, 'NodoBinario' )){               //verifico que efectivamente sea un nodo
            $this->der=$hijo;                           //ahora el nodo es mi hijo
            $hijo->padre=$this;                     //y hago que me reconozca como tal
        }
        if ($hijo==null && $this->der != null) {                              //si quiero matar a mi hijo
            $this->der->padre=null;                 //me aseguro que mi hijo me suelte
            $this->der=null;                           //y luego yo lo suelto a el
        }
    }
    public function getDerecho(){
        return $this->der;
    }
    
    public function grado(){
        if($this->der != null && $this->izq != null){
            return 2;
        }else if($this->der == null && $this->izq == null){
            return 0;
        }else{ 
            return 1;
        }
    }
    public function nivel(){
        if($this->padre != null){
            return $this->padre->nivel()+1;
        } 
        return 0;
    }
    public function hijo(){
        if($this->izq != null && $this->der == null){
            return  "izq";
        }
        if($this->izq == null && $this->der != null){
            return  "der";
        }
        if($this->izq != null && $this->der != null){
            return  "amb";
        }
        return "vac";
    }
    
    public function mostrar(){
        $padre='';
        if($this->padre != null){
            $padre = $this->padre->getValor()."-".$this->padre->nivel();
        }
        echo"[{'v':'".$this->valor."-".$this->nivel()."',",
                "'f':'<div>".$this->valor."</div>'},",
                "'".$padre."',",
                "'Grado: ".$this->grado()." Nivel: ".$this->nivel()."']";
        if ($this->izq != null) {
            echo ",";
            $this->izq->mostrar();
        }
        if ($this->der != null) {
            echo ",";
            $this->der->mostrar();
        }
    }
}
//$nodo2 = new NodoBinario(15,null,new NodoBinario(30),$nodo);
//
//echo $nodo->hijo();


