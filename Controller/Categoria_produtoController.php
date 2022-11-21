<?php

namespace App\Controller;

use App\Model\Categoria_produtoModel;

class Categoria_produtoController extends Controller
{
    
    public static function index() 
    {
        
        $model = new Categoria_produtoModel(); 
        $model->getAllRows(); 

        
        parent::render('Categoria_produto/ListaCategoria_produto', $model);
    }

   
    public static function form()
    {

        $model = new Categoria_produtoModel();

        if(isset($_GET['id'])) 
			
            $model = $model->getById( (int) $_GET['id']); 
			

        parent::render('Categoria_produto/FormCategoria_produto', $model);
        
    }

    
    public static function save() {
        
        $model = new Categoria_produtoModel();

        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->descricao = $_POST['descricao'];

        $model->save();  

        header("Location: /categoria_produto"); 
    }


    
    public static function delete()
    {

        $model = new Categoria_produtoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /categoria_produto"); 
    }


}