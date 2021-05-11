<?php

interface ProdutoDAO {
    //create
    public function add(Produto $p);
    //read
    public function findAll();
    public function findById($id);
    public function findByNome($nome);
    //update
    public function update(Produto $p);
    //delete
    public function delete($id);
}

class Produto {
    private $id;
    private $nome;
    private $qt;
    private $preco;
    private $lucro;
    private $p_produto;

    //SET'S
    public function setId($id)
    {
        //
        $this->id = trim($id);
    }

    public function setNome($nome)
    {
        $this->nome = ucwords(trim($nome));
    }

    public function setQt($qt)
    {
        $this->qt = $qt;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function setPorcentagem($p_produto) {
        $this->p_produto = $p_produto;
    }

    public function setLucro($lucro) {
        $this->lucro = $lucro;
    }

    //GET'S
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getQt()
    {
        return $this->qt;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getPorcentagem() 
    {
        return $this->p_produto;
    }

    public function getLucro()
    {
        return $this->lucro;
    }
}

// Porcentagem por produto 
// 






?>