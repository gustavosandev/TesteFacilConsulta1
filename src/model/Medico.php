<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
include_once 'Banco.php';

class Medico extends Banco {

    protected $table = 'medico';
    private $id;
	private $email;
    private $nome;
    private $senha;
    private $data_criacao;
    private $data_alteracao;

    public function insert() {

        $sql = "INSERT INTO $this->table (nome, email, senha, data_criacao) VALUES (:nome, :email, :senha, :data_criacao)";
        $stmt = Banco::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':data_criacao', $this->data_criacao);
     
     
        return $stmt->execute();
    }
    
    public function update($id) {

        $sql = "UPDATE $this->table 
        SET nome=:nome, data_alteracao=:data_alteracao, senha=:senha
        WHERE id = :id";
        $stmt = Banco::prepare($sql);
        
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':data_alteracao', $this->data_alteracao);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function select($id){
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = Banco::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	
	public function selectAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Banco::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = Banco::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     *
     * @return self
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }

    /**
     * @param mixed $data_criacao
     *
     * @return self
     */
    public function setDataCriacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAlteracao()
    {
        return $this->data_alteracao;
    }

    /**
     * @param mixed $data_alteracao
     *
     * @return self
     */
    public function setDataAlteracao($data_alteracao)
    {
        $this->data_alteracao = $data_alteracao;

        return $this;
    }
}