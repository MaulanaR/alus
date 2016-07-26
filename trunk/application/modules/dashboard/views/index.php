<?php 
echo " INI Halaman awal, semua yang tidak punya akses menu akan di redirect ke halaman ini , lokasinya di modules/dashboard/view";
?>
<?php 
echo "<br/>";
echo $this->alus_auth->decrypt($this->session->userdata('identity'))."cara decrypt emailnya gini : \$this->alus_auth->decrypt(email)";
echo "<br/>";
echo $this->session->userdata('username');
echo "<br/>";
echo $this->session->userdata('user_id');
echo "<br/>";
echo $this->session->userdata('first_name');
echo "<br/>";
echo $this->session->userdata('last_name');
echo "<br/>";
echo $this->session->userdata('old_last_login');
echo "<br/>";
print_r($this->session->userdata('group'));
echo "<br/>";
echo $this->session->userdata('job');
echo "<br/>";

?>