<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once 'Banco.php';

class Horario extends Banco {

    protected $table = 'horario';
    private $id;
    private $id_medico;
    private $data_horario;
    private $horario_agendado;
    private $data_criacao;
    private $data_alteracao;

    public function insert() {

        $sql = "INSERT INTO $this->table (data_criacao, data_horario, horario_agendado, id_medico) VALUES (:data_criacao, :data_horario, :horario_agendado, :id_medico)";
        $stmt = Banco::prepare($sql);
        $stmt->bindParam(':data_criacao', $this->data_criacao);
        $stmt->bindParam(':horario_agendado', $this->horario_agendado);
        $stmt->bindParam(':data_horario', $this->data_horario);
        $stmt->bindParam(':id_medico', $this->id_medico);
     
        return $stmt->execute();
    }

    public function select($id){
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = Banco::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

    public function selectTime($id_medico){
        $sql  = "SELECT * FROM $this->table WHERE id_medico = :id_medico";
        $stmt = Banco::prepare($sql);
        $stmt->bindParam(':id_medico', $id_medico, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function selectTimeunScheduled($id_medico){
        $sql  = "SELECT 
                    * 
                FROM 
                    $this->table 
                WHERE 
                    id_medico = :id_medico 
                AND 
                    horario_agendado = 0
                AND
                    data_horario >= NOW()
                ORDER BY data_horario ASC";
        $stmt = Banco::prepare($sql);
        $stmt->bindParam(':id_medico', $id_medico, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
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

    public function update($id) {

        $sql = "UPDATE $this->table 
        SET data_alteracao=:data_alteracao, horario_agendado = :horario_agendado
        WHERE id = :id";
        $stmt = Banco::prepare($sql);
        
        $stmt->bindParam(':horario_agendado', $this->horario_agendado);
        $stmt->bindParam(':data_alteracao', $this->data_alteracao);
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
    public function getIdMedico()
    {
        return $this->id_medico;
    }

    /**
     * @param mixed $id_medico
     *
     * @return self
     */
    public function setIdMedico($id_medico)
    {
        $this->id_medico = $id_medico;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataHorario()
    {
        return $this->data_horario;
    }

    /**
     * @param mixed $data_horario
     *
     * @return self
     */
    public function setDataHorario($data_horario)
    {
        $this->data_horario = $data_horario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorarioAgendado()
    {
        return $this->horario_agendado;
    }

    /**
     * @param mixed $horario_agendado
     *
     * @return self
     */
    public function setHorarioAgendado($horario_agendado)
    {
        $this->horario_agendado = $horario_agendado;

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