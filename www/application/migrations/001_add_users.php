<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ),
            'nombre' => array(
                'type' => 'varchar',
                'constraint' => 255,
            ),
            'email' => array(
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true
            ),
            'fecha_registro' => array(
                'type' => 'timestamp',
                'null' => true,
            )
        ));

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('usuarios');
        
        echo "Migracion 1 - Usuarios: OK <br/>";
    }
    
    public function down()
    {
        $this->dbforge->drop_table('usuarios');
    }
}