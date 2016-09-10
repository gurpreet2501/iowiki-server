<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_field_type_in_products_table extends CI_Migration {
        public function up()
        {   


              $fields = array(
                        'product_type' => array(            
                        'type' => 'ENUM(
                                "Domestic",
                                "Export"
                        )',
                        'default' => 'Domestic',
                        'null' => FALSE,
                                                ),
                );
                $this->dbforge->add_column('products', $fields);
        }

        public function down()
        {
              
        }
}