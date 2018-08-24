<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class teste {
    
    private $cor;
    public static $corS = 'Vermelho Estático.';
    
    function __construct($cor) {
        $this->cor = $cor;
    }
    
    private function mensagemCor($cor) {
        return "A cor é $cor.";
    }
    
    public function getCor() {
        return $this->mensagemCor($this->cor);
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
    
    public function valS() {
        return self::$corS;
    }
    
}

print teste::valS();

//$teste = new teste('vermelha');

//echo $teste->getCor();