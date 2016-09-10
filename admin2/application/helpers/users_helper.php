<?php

function user_type($id){
	$CI = get_instance();
	$user = obj('users')->read(['select' => ['customer_type'],
                               'where'  => ['id',$id]
    ]);
    
    return  $user[0]['customer_type'];
    
}