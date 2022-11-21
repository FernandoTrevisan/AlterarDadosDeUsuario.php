<?php

namespace App\Model;

use App\DAO\Categoria_produtoDAO;


class Categoria_produtoModel extends Model
{
    
    public $id, $nome, $descricao;

    
    public function save()
    {

        $dao = new Categoria_produtoDAO();

        
        if(empty($this->id))
        {
            
            $dao->insert($this);
			
			
        } else {
			
            $dao->update($this); 
        } 

    }

    public function getAllRows()
    {        
        
        $dao = new Categoria_ProdutoDAO();

        
        $this->rows = $dao->select();
    }


    
    public function getById(int $id)
    { 

        $dao = new Categoria_ProdutoDAO();

        $obj = $dao->selectById($id);

        
        return ($obj) ? $obj : new Categoria_ProdutoModel();

    }

    
    public function delete(int $id)
    {

        $dao = new Categoria_produtoDAO();

        $dao->delete($id);
    }

}