<?php
class User_model extends CI_Model
{
    private $table = 'users';

    private $id;
    private $name;
    private $email;
    private $created_at;

    const ID = 'id';
    const NAME = 'nombre';
    const EMAIL = 'email';
    const CREATED_AT = 'fecha_registro';

    public function readAll()
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function insert()
    {
        $bool = $this->db->insert($this->table, $this->getDataArrayUser());
        $this->id = $this->db->insert_id();

        return $bool;
    }

    private function getDataArrayUser()
    {
        $data = array(
            self::NAME => $this->name,
            self::EMAIL => $this->email);

        if ($this->created_at != '') {
            $data = array_merge($data, [self::CREATED_AT => $this->created_at]);
        }

        return $data;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
