<?php

namespace App\Controller;

use App\Model\FuncionarioModel;



class FuncionarioController extends Controller
{
    
    public static function index() 
    {

        $model = new FuncionarioModel();
        $model->getAllRows();

        parent::render('Funcionario/ListaFuncionario', $model);
    }

   
    public static function form()
    {

        $model = new FuncionarioModel();

        if(isset($_GET['id'])) 
			
            $model = $model->getById( (int) $_GET['id']); 
			
            parent::render('Funcionario/FormFuncionario', $model);
    }

    
    public static function save() {

        
        $model = new FuncionarioModel();

        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->rg = $_POST['rg'];
        $model->cpf = $_POST['cpf'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];
        $model->endereco = $_POST['endereco'];

        $model->save();  

        header("Location: /funcionario"); 
    }


    
    public static function delete()
    {

        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /funcionario"); 
    }



}