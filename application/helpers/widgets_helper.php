<?php



function tech_events(){

    $data =  lako::get('objects')->get('dggsjm_tech_events')->read(array(

        'select'        => array('^*'),

        'order_by'       => array('start_date','ASC'),

        'pagination'    => array(

            'page'     =>  1,

            'per_page' => 10     

         )   

    ));
   

    return $data['results'];

}



function get_hiring_agencies(){



    $CI = get_instance();



    if (!$data = $CI->cache->get('hiring-agencies'))

    {

         $data =  lako::get('objects')->get('dggsjm_hiring_agencies')->read(array(

        'select'        => array('^*'),

        'order_by'       => array('id','DESC'),

        'pagination'    => array(

            'page'     =>  1,

            'per_page' =>  7     

             )     

         )); 



        $CI->cache->save('hiring-agencies', $data, 60*60);



    }



  



    return $data['results'];

}



function get_page($id=null){

    $CI = get_instance();

    $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

    if (!$data = $CI->cache->get('page-'.$id))

    {
        $data = lako::get('objects')->get('dggsjm_pages')->read(array(

            'select'  => array('^*'),

            'where'   => array(

                     array('id', $id),

                     'AND',

                     array('disable', 0),

          )  

         ));
        $CI->cache->save('page-'.$id, $data, 60*60);
    }


    return $data[0] ? $data[0] : redirect(404);

}



function get_pages_list(){

   

    $data = lako::get('objects')->get('dggsjm_pages')->read(array(

            'select'  => array('id','page_slug','page_name'),

            'where'   => array('disable', 0)

    ));

    

    return $data;

}

// function post($url, $data){

//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//       CURLOPT_URL => $url,
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_CUSTOMREQUEST => "POST",
//       CURLOPT_POSTFIELDS => $data,
//     ));

//     $response = curl_exec($curl);

//     $err = curl_error($curl);

//     curl_close($curl);

//     if ($err) 
//       return false;
//     else
//       return $response;
//       // return $response;
//   }

// function validate_captcha($data){

//  $url = 'https://www.google.com/recaptcha/api/siteverify';
//  $verification_data['secret'] = '6LeloRcTAAAAAGacXIXpxSN-JpgIHraenUouxPkD';
//  $verification_data['response'] = $data['g-recaptcha-response'];
//  $verification_data['remoteip'] = $_SERVER['REMOTE_ADDR'];

//  $res =  post($url, $verification_data);
 
//  var_dump($res);
//  exit;
 
//  // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret='6LeloRcTAAAAAGacXIXpxSN-JpgIHraenUouxPkD'&response=".$data['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);


// }


