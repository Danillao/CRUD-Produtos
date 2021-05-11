<?php
require_once 'models/Produto.php';

class ProdutoDAOMySQL implements ProdutoDAO {
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    //create
    public function add(Produto $p)
    {
      $sql = $this->pdo->prepare("INSERT INTO produto(nome, qt, preco, lucro) VALUES(:nome, :qt, :preco, :lucro)"); 
      $sql->bindValue(':nome',$p->getNome());
      $sql->bindValue(':qt',$p->getQt());
      $sql->bindValue(':preco',$p->getPreco());
      $sql->bindValue(':lucro',$p->getLucro());
      $sql->execute();
      
      $p->setId($this->pdo->lastInsertId());

      return $p;
    }

    //read
    public function findAll()
    {
        $array = [];

        $sql= $this->pdo->query("SELECT * FROM produto");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $p = new Produto;

                $p->setId($item['id']);
                $p->setNome($item['nome']);
                $p->setQt($item['qt']);
                $p->setPreco($item['preco']);
                $p->setLucro($item['lucro']);

                $array[] = $p; 
            }
        }

        return $array;
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM produto WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $p = new Produto();

            $p->setId($data['id']);
            $p->setNome($data['nome']);
            $p->setQt($data['qt']);
            $p->setPreco($data['preco']);
            $p->setLucro($data['lucro']);

            return $p;
        } else {
            return false;
        }
    }

    public function findByNome($nome)
    {
        $sql = $this->pdo->prepare("SELECT * FROM produto WHERE nome = :nome");
        $sql->bindValue(':nome', $nome);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $p = new Produto();

            $p->setId($data['id']);
            $p->setNome($data['nome']);
            $p->setQt($data['qt']);
            $p->setPreco($data['preco']);
            $p->setLucro($data['lucro']);

            return $p;
        } else {
            return false;
        }
    }

    //update
    public function update(Produto $p)
    {
        $sql = $this->pdo->prepare("UPDATE produto SET nome = :nome, qt = :qt, preco = :preco,  lucro = :lucro WHERE id = :id"); 
        $sql->bindValue(':nome', $p->getNome());
        $sql->bindValue(':qt', $p->getQt());
        $sql->bindValue(':preco', $p->getPreco());
        $sql->bindValue(':lucro', $p->getLucro());
        $sql->bindValue(':id', $p->getId());
        $sql->execute();

        return true;
    }

    //delete
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM produto WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}





?>