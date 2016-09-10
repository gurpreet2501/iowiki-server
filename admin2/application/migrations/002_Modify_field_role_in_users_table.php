<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Modify_field_role_in_users_table extends CI_Migration {

        public function up()
        {
              $fields = array(
                        'role' => array(            
                        'type' => 'ENUM(
                                "admin",
                                "plant_manager",
                                "customer",
                                "depot",
                                "functional_head"
                        )',
                        'default' => 'customer',
                        'null' => FALSE,
                                                ),
                );
                $this->dbforge->modify_column('users', $fields);
        }

        public function down()
        {
              
        }
}