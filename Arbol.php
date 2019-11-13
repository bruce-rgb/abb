<?php
include_once 'NodoBinario.php';
class Arbol {
    public $root;
    public $altura;
    public $grado = 2;
    
    public function Arbol(){
        $root=null;
    }
    public function agregarNodo($valor){
        if ($this->root == null) {
            $this->root=new NodoBinario($valor);
        }else {
            $ap = $this->root;
            while(true){
                if($valor <= $ap->getValor()){ //hacia a donde
                    if ($ap->getIzquierdo() == null) {
                        $ap->setIzquierdo(new NodoBinario($valor));
                        break;
                    } else{
                        $ap=$ap->getIzquierdo();
                    }
                }else{
                    if ($ap->getDerecho() == null) {
                        $ap->setDerecho(new NodoBinario($valor));
                        break;
                    } else{
                        $ap=$ap->getDerecho();
                    }
                }
            }
        }
    }
    public function eliminarNodo(){
        
    }
    public function modificarNodo(){
        
    }
    /*
    public function buscarporValor(){
        if ($this->root != null) {
            $ap=$this->root;
            while ($ap) {
                //
            }
        }
    }
    */
    public function camino(){
        
    }
    public function subArbol(){ //opcional?
        
    }
    public function minimo(){
        if($this->root != null){
            $ap = $this->root;
            while($ap->getIzquierdo() != null){
                $ap = $ap->getIzquierdo();
            }
            return $ap;
        }
    }
    public function maximo(){
        if($this->root != null){
            $ap = $this->root;
            while($ap->getDerecho() != null){
                $ap = $ap->getDerecho();
            }
            return $ap;
        }
    }
    public function inOrder(){
        
    }
    public function preOrder(){
        
    }
    public function postOrder(){
        
    }
    public function nodosInternos(){
        
    }
    public function nodosExternos(){
        
    }
    public function print(){
        if ($this->root == null) 
        {
            //no imprimir nada
        } 
        else{
            $this->root->mostrar();
        }
    }
}

