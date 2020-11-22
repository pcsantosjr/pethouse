<?php

namespace Carrinho;

use Produto;

class CartItem {
    private $produto;
    private $quantidade;

    public function _constuct(Produto $produto, $quantidade){
        $this->produto = $produto;
        $this->quantidade = (int)$quantidade;
    }

    public function getProduto (){
        return $this->produto;
        
    }
    public function getQuantidade (){
        return $this->quantidade;
        
    }

    public function getSubTotal (){
        return $this->produto->getPreco() * $this->quantidade;
    }
}
?>