<?php
require_once __DIR__ . "/../configs/conexao.php";

class Livro {
    private $id_livro;
    private $titulo;
    private $ano_pub;
    private $autor;
    private $resumo;
    private $capa;
    private $categoria;


    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM livro";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Erro ao listar livros: ' . $e->getMessage();
        }
    }

    public static function buscarPorId($id){
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT livro.*, categoria.nome FROM livro JOIN categoria ON livro.id_categoria = categoria.id_categoria WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Erro ao buscar o livro: ' . $e->getMessage();
        }
    }

    public function inserir ($titulo,$ano,$autor,$resumo,$capa,$categoria) {
        try {
            $conexao = Conexao::conectar();
            $sql = "INSERT INTO categoria (titulo,ano_pub,autor,resumo,capa,id_categoria) VALUES (:titulo,:ano_pub,:autor,:resumo,:capa,:id_categoria)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":titulo",$titulo);
            $stmt->bindValue(":ano_pub",$ano);
            $stmt->bindValue(":autor",$autor);
            $stmt->bindValue(":resumo",$resuno);
            $stmt->bindValue(":capa",$capa);
            $stmt->bindValue(":id_categoria",$categoria);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getmessage();
        }
    }

    
 public function deletar($id)
    {
        // usamos try/catch quando existe possibilidade de erro, principalmente ao usar banco de dados
        // o try é onde tentamos executar o código
        try {
            // chama o método conectar() da classe Conexao
            // cria uma conexão configurada e guarda na variável $conexao
            $conexao = Conexao::conectar();

            // comando SQL responsável por excluir um item
            // :id é um espaço reservado para o ID do item que será excluído
            $sql = "DELETE FROM livro WHERE id_livro = :id";

            // prepara o SQL para executar
            $stmt = $conexao->prepare($sql);

            // coloca o valor de $id no espaço reservado :id
            $stmt->bindValue(':id', $id);

            // executa o comando no banco
            $stmt->execute();
        } catch (PDOException $e) { // executa caso aconteça um erro
            // mostra o erro encontrado
            echo $e->getMessage();
        }
    }

     // metodo para carregar os dados do item baseado no id
    // faz parte do R (Read) do CRUD
    public function carregar($id)
    {
        // usamos try/catch quando existe possibilidade de erro, principalmente ao usar banco de dados
        // o try é onde tentamos executar o código
        try {
            // chama o método conectar() da classe Conexao
            // cria uma conexão configurada e guarda na variável $conexao
            $conexao = Conexao::conectar();

            // comando SQL responsável por buscar uma categoria pelo seu ID
            // :id é um espaço reservado para o ID da categoria que será buscada
            $sql = "SELECT * FROM livro WHERE id_livro = :id";

            // prepara o SQL para executar
            $stmt = $conexao->prepare($sql);

            // coloca o valor de $id no espaço reservado :id
            $stmt->bindValue(':id', $id);

            // executa o comando no banco
            $stmt->execute();

            // pega o resultado encontrado no banco
            // como estamos buscando pelo ID, esperamos apenas um registro
            $resultado = $stmt->fetch();

            // verifica se foi encontrada alguma categoria
            if ($resultado) {
                // coloca o ID encontrado no atributo id_categoria do objeto que chamou o metodo
                $this->id_livro = $resultado['id_livro'];

                // coloca o nome encontrado no atributo nome do objeto que chamou o metodo
                $this->titulo = $resultado['ano_pub'];
                $this->titulo = $resultado['autor'];
                $this->titulo = $resultado['resumo'];
                $this->titulo = $resultado['capa'];
                $this->titulo = $resultado['id_categoria'];

            }
        } catch (PDOException $e) { // executa caso aconteça um erro
            // mostra o erro encontrado
            echo $e->getMessage();
        }
    }

    
    public function atualizar($titulo,$ano_pub,$autor,$resumo,$capa,$categoria){  
        try{
            $conexao = Conexao::conectar();
            $sql = "UPDATE livro  SET titulo = :titulo, ano_pub = :ano_pub, autor = :autor, resumo = :resumo, capa = :capa, categoria = :id_categoria WHERE id_livro = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":titulo" , $titulo);
            $stmt->bindValue(":ano_pub" , $ano_pub);
            $stmt->bindValue(":autor" , $autor);
            $stmt->bindValue(":resumo" , $resumo);
            $stmt->bindValue(":capa" , $capa);
            $stmt->bindValue(":id_categoria" , $categoria);
            $stmt->bindValue(":id" , $id);
            $stmt->execute();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
        }
}
    
