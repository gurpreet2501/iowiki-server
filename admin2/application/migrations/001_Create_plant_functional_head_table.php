<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_plant_functional_head_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'plant_id' => array(
                                'type' => 'INT',
                        ),
                        'functional_head_id' => array(
                                'type' => 'INT',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('plant_functional_head');
        }

        public function down()
        {
              
        }
}