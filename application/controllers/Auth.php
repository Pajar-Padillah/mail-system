<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->model('M_Login');
}


public function index() {
$this->load->view('login');
}

public function cek_login() {
 $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
 $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

 $cek_hasil=$this->M_Login->cek_user($username,$password);
 echo("<script type='text/javascript'> console.log(JSON.parse('" . json_encode($cek_hasil) . "'));</script>");
 
        if($cek_hasil->num_rows() > 0){ //jika login sebagai ADMIN
                        $data=$cek_hasil->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['level']=='Admin'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['id_user']);
                    $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_wilker',$data['id_wilker']);
                    redirect('home');
 
                 }else{ //akses wILKER
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['id_user']);
                    $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    $this->session->set_userdata('ses_wilker',$data['id_wilker']);
                    redirect('home2');
                 }
 
     
 
    }
    redirect('');
    echo '<?php  <div class="alert alert-warning" role="alert">
  A simple warning alert—check it out!
</div>
    ?>';

}
function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}

?>