<?php

namespace Carrinho;

class CartSession implements Cart {
    private $itens = [];

    public function _constructor(){
        $this->itens = $this->restore();
    }
    
    public function restore(){
        return isset($_SESSION['cart']) ? unserialize($_SESSION['cart']) : array();
    }

    public function has($id){
        return isset($this->itens[$id]);
    }
    public function add (CartItem $item){
        $id = $item->getProduto () ->getId();
        if(!$this->has($id)){
            $this->itens[$id] = $item;
        }
    }

    public function update (CartItem $item){
        $id = $item->getProduto()->getId();
        if($this->has($id)){
            if(!$item->getQuantidade()){
                $this->delete($id);
                return;
            }
            $this->itens[$id] = $item;
        }
    }

    public function delete ($id){
        if($this->has($id)){
            unset($this->itens[$id]);
        }
    }

    public function getTotal(){
        $total = 0;
        foreach ($this->itens as $item){
            $total += $item->getSubTotal();
        }
        return $total;
    }

    public function getCartItens () {
        return $this->itens;
    }

    public function _destruct(){
        $_SESSION['cart'] = serialize($this->itens);
    }
}
?>