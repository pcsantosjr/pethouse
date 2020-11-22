<?php
namespace Carrinho;

interface Cart {

    public function add(CartItem $item);
    public function update(CartItem $item);
    public function delete($id);
    public function has($id);
    public function getTotal ();
    public function getCartItens ();
}
?>