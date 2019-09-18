<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('webservice')){
	function webservice($port,$url,$parameter){
    $curl = curl_init();
    set_time_limit(0);
    curl_setopt_array($curl, array(
      CURLOPT_PORT => $port,
      CURLOPT_URL => "http://".$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $parameter,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
        ),
      )
    );
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    if ($err) {
      $response = ("Error #:" . $err);
    }else{
      $response;
    }
    
    return $response;
  }
}

  if(!function_exists('nav_url')) {
    function nav_url($folder,$controller,$url)
    {
      if ($folder == $controller) {
        return $folder.'/'.$url;
      }else{
        return $folder.'/'.$controller.'/'.$url;
      }
    }
  }

  if(!function_exists('active_menu')) {
    function active_menu($controller) {
      // Getting CI class instance.
      $CI = get_instance();
      // Getting router class to active.
      $class = $CI->router->fetch_class();
      return ($class == $controller) ? 'active' : '';
    }
  }

  if(!function_exists('log_insert')) {
    function insert_log($tipe,$menu)
    {
      $CI = get_instance();
      $CI->load->model('ap_aktivitas/m_ap_aktivitas');
      $nama = $CI->session->userdata('nama');
      switch ($tipe) {
        case 'read':
          $action = 'Mengakses data ';
          break;

        case 'insert':
          $action = 'Menambah data ';
          break;
        
        case 'update':
          $action = 'Memperbarui data ';
          break;

        case 'delete':
          $action = 'Menghapus data ';
          break;
      };

      $CI->load->library('user_agent');

      if ($CI->agent->is_browser()){
        $agent = $CI->agent->browser().' '.$CI->agent->version();
      }elseif ($CI->agent->is_robot()){
        $agent = $CI->agent->robot();
      }elseif ($CI->agent->is_mobile()){
        $agent = $CI->agent->mobile();
      }else{
        $agent = 'Unidentified';
      }

      $data = array(
        'id_pengguna' => $CI->session->userdata('id_pengguna'),
        'nama' => $nama,
        'tipe' => $tipe,
        "ip" => $CI->input->ip_address(),
        "user_agent" => $agent,
        "platform" => $CI->agent->platform(),
        'deskripsi' => $action.$menu,
      );

      $CI->m_ap_aktivitas->insert($data);
    }

    if(!function_exists('id_to_date')) {
      function id_to_date($date)
      {
        if ($date == '' || $date == null) {
          return '';
        }else{
          $raw = explode("-", $date);
          return $raw[2].'-'.$raw[1].'-'.$raw[0];
        }
      }
    }

    if(!function_exists('date_to_id')) {
      function date_to_id($date)
      {
        if($date == '' || $date == null){
          return '';
        }else{
          $raw = explode("-", $date);
          return $raw[2].'-'.$raw[1].'-'.$raw[0];
        }
      }
    }
    
    if(!function_exists('hitung_umur')) {
      function hitung_umur($tanggal_lahir) {
        list($year,$month,$day) = explode("-",$tanggal_lahir);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($month_diff < 0) $year_diff--;
            elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
        return $year_diff;
      }
    }

    if(!function_exists('is_url_exists')) {
      function is_url_exists($url){
        $ch = curl_init($url);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  
        if($code == 200){
          $status = true;
        }else{
          $status = false;
        }
        curl_close($ch);
        
        return $status;
      }
    }

    if(!function_exists('dateDifference')) {
      function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ){
          $datetime1 = date_create($date_1);
          $datetime2 = date_create($date_2);
          
          $interval = date_diff($datetime1, $datetime2);
          
          return $interval->format($differenceFormat);
          
      }
    }

    if(!function_exists('month_id')) {
      function month_id($m){
        $m = intval($m);
        switch ($m) {
          case 1:
            return 'Januari';
            break;
          
          case 2:
            return 'Februari';
            break;

          case 3:
            return 'Maret';
            break;

          case 4:
            return 'April';
            break;

          case 5:
            return 'Mei';
            break;
          
          case 6:
            return 'Juni';
            break;

          case 7:
            return 'Juli';
            break;
          
          case 8:
            return 'Agustus';
            break;

          case 9:
            return 'September';
            break;

          case 10:
            return 'Oktober';
            break;

          case 11:
            return 'November';
            break;
          
          case 12:
            return 'Desember';
            break;
        }
      }
    }

    if(!function_exists('date_id')) {
      function date_id($date){
        if($date == '' || $date == null){
          return '';
        }if ($date == '0000-00-00'){
          return '';
        }else{
          $raw = explode("-", $date);
          return $raw[2].' '.month_id($raw[1]).' '.$raw[0];
        }
      }
    }

    if(!function_exists('list_month')) {
      function list_month(){
        $data = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember',
        );
        return $data;
      }
    }

    if(!function_exists('digit')) {
      function digit($num=null){
        if($num != '') {
            return number_format(abs($num), 0, ',', '.');
        }
      }
    }

    if (!function_exists('time_elapsed_string')) {
      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yg lalu' : 'baru saja';
      }
    }

    if ( ! function_exists('word_limiter'))
    {
      /**
      * Word Limiter
      *
      * Limits a string to X number of words.
      *
      * @param	string
      * @param	int
      * @param	string	the end character. Usually an ellipsis
      * @return	string
      */
      function word_limiter($str, $limit = 100, $end_char = '&#8230;')
      {
        if (trim($str) === '')
        {
          return $str;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

        if (strlen($str) === strlen($matches[0]))
        {
          $end_char = '';
        }

        return rtrim($matches[0]).$end_char;
      }
    }
  }