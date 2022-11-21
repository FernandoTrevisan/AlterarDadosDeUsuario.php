<?php

namespace App\Model;

use App\DAO\FuncionarioDAO;


class FuncionarioModel extends Model
{
    
    public $id, $nome, $rg, $cpf;
    public $data_nascimento, $email;
    public $telefone, $endereco;

    
    public function save()
    {

        $dao = new FuncionarioDAO();

        
        if(empty($this->id))
        {
            
            $dao->insert($this);
			
        } else {
			
            $dao->update($this); 
        } 
        
    }

    public function getAllRows()
    {
        
        
        $dao = new FuncionarioDAO();

        
        $this->rows = $dao->select();
    }



    public function getById(int $id)
    {

        $dao = new FuncionarioDAO();

        $obj = $dao->selectById($id); 

        
        return ($obj) ? $obj : new FuncionarioModel(); 
       

    }

    
    public function delete(int $id)
    {

        $dao = new FuncionarioDAO();

        $dao->delete($id);
    }

}