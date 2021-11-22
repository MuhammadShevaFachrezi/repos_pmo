<?php


    class Crud extends CI_Controller{ 

        function __construct(){
            parent::__construct();		
            $this->load->model('m_data');
            $this->load->helper('url');
        }
        
        //registrasi

        function register(){
            $this->load->view('register/register');
        }

        function tambah_registrasi(){
            $nama_pekerja = $this->input->post('nama_pekerja');
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $data = array(
                'nama_pekerja' => $nama_pekerja,
                'username' => $username,
                'password' => $password
                );
            $this->m_data->tambahregistrasi_data($data,'data_user');
            redirect('crud/login');
        }

        //login

        function login(){
            $this->load->view('login/login');
        }

        function aksi_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => $password
                );
            $cek = $this->m_data->cek_login("data_user",$where)->num_rows();
            if($cek > 0){
     
                $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
     
                $this->session->set_userdata($data_session);
     
                redirect("crud/index");
     
            }else{
                echo "Username dan password salah !";
            }
        }

        //tabel timesheet


        function index(){
            //echo "ini adalah method index di controller crud";
            $data['tbl_timesheet'] = $this->m_data->tampil_data()->result();
            $this->load->view("tampil_v",$data);
        }

        function tambah(){
            $this->load->view('input_v');
        }

        function tambah_aksi(){
            $tanggal = $this->input->post('tanggal');
            $pekerjaan = $this->input->post('pekerjaan');
            $kegiatan = $this->input->post('kegiatan');
            $id_pegawai = $this->input->post('id_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $pic = $this->input->post('pic');
            $durasi = $this->input->post('durasi');
            $progress = $this->input->post('progress');


            $data = array(
                'tanggal' => $tanggal,
                'pekerjaan' => $pekerjaan,
                'kegiatan' => $kegiatan,
                'id_pegawai' => $id_pegawai,
                'nama_pegawai' => $nama_pegawai,
                'pic' => $pic,
                'durasi' => $durasi,
                'progress' => $progress
                );
            $this->m_data->input_data($data,'tbl_timesheet');
            redirect('crud/index');
        }

        function edit($no_timesheet){
            $where = array('no_timesheet' => $no_timesheet);
            $data['tbl_timesheet'] = $this->m_data->edit_data($where,'tbl_timesheet')->result();
            $this->load->view('edit_v',$data);
        }

        function update(){
            $no_timesheet = $this->input->post('no_timesheet');
            $tanggal = $this->input->post('tanggal');
            $pekerjaan = $this->input->post('pekerjaan');
            $kegiatan = $this->input->post('kegiatan');
            $id_pegawai = $this->input->post('id_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $pic = $this->input->post('pic');
            $durasi = $this->input->post('durasi');
            $progress = $this->input->post('progress');
            $status = $this->input->post('status');
         
            $data = array(
                'tanggal' => $tanggal,
                'pekerjaan' => $pekerjaan,
                'kegiatan' => $kegiatan,
                'id_pegawai' => $id_pegawai,
                'nama_pegawai' => $nama_pegawai,
                'pic' => $pic,
                'durasi' => $durasi,
                'progress' => $progress,
                'status' => $status
            );
         
            $where = array(
                'no_timesheet' => $no_timesheet
            );
         
            $this->m_data->update_data($where,$data,'tbl_timesheet');
            redirect('crud/index');
        }

        function hapus($no_timesheet){
            $where = array('no_timesheet' => $no_timesheet);
            $this->m_data->hapus_data($where,'tbl_timesheet');
            redirect('crud/index');
        }

        //spreadsheet

        function spreadsheet_timesheet(){
            $this->load->view('Spreadsheet/timesheet');
        }

        //pdf

        function pdf_timesheet(){
            $this->load->view('pdf_timesheet');
        }

//tabel penugasan

        function index2(){
            //echo "ini adalah method index di controller crud";
            $data['data_penugasan'] = $this->m_data->tampil_data2()->result();
            $this->load->view("tampil_v2",$data);
        }

        function tambah2(){
            $this->load->view('input_v2');
        }

        function tambah_aksi2(){
            $kode_penugasan = $this->input->post('kode_penugasan');
            $nama_pekerjaan = $this->input->post('nama_pekerjaan');
            $pemberi_kerja = $this->input->post('pemberi_kerja');
            $pic = $this->input->post('pic');
            $tanggal_penugasan = $this->input->post('tanggal_penugasan');
            $kategori = $this->input->post('kategori');


            $data = array(
                'kode_penugasan' => $kode_penugasan,
                'nama_pekerjaan' => $nama_pekerjaan,
                'pemberi_kerja' => $pemberi_kerja,
                'pic' => $pic,
                'tanggal_penugasan' => $tanggal_penugasan,
                'kategori' => $kategori
                );
            $this->m_data->input_data2($data,'data_penugasan');
            redirect('crud/index2');
        }

        function edit2($nomor){
            $where = array('nomor' => $nomor);
            $data['data_penugasan'] = $this->m_data->edit_data2($where,'data_penugasan')->result();
            $this->load->view('edit_v2',$data);
        }

        function update2(){
            $nomor = $this->input->post('nomor');
            $kode_penugasan = $this->input->post('kode_penugasan');
            $nama_pekerjaan = $this->input->post('nama_pekerjaan');
            $pemberi_kerja = $this->input->post('pemberi_kerja');
            $pic = $this->input->post('pic');
            $tanggal_penugasan = $this->input->post('tanggal_penugasan');
            $kategori = $this->input->post('kategori');
         
            $data = array(
                'kode_penugasan' => $kode_penugasan,
                'nama_pekerjaan' => $nama_pekerjaan,
                'pemberi_kerja' => $pemberi_kerja,
                'pic' => $pic,
                'tanggal_penugasan' => $tanggal_penugasan,
                'kategori' => $kategori
            );
         
            $where = array(
                'nomor' => $nomor
            );
         
            $this->m_data->update_data2($where,$data,'data_penugasan');
            redirect('crud/index2');
        }

        function hapus2($nomor){
            $where = array('nomor' => $nomor);
            $this->m_data->hapus_data2($where,'data_penugasan');
            redirect('crud/index2');
        }

        //spreadsheet

        function spreadsheet_data_penugasan(){
            $this->load->view('Spreadsheet/data_penugasan');
        }

        //pdf

        function pdf_data_penugasan(){
            $this->load->view('pdf_data_penugasan');
        }


//tabel WBS

        function index3(){
            //echo "ini adalah method index di controller crud";
            $data['wbs'] = $this->m_data->tampil_data3()->result();
            $this->load->view("tampil_v3",$data);
        }

        function tambah3(){
            $this->load->view('input_v3');
        }

        function tambah_aksi3(){
            $kegiatan = $this->input->post('kegiatan');
            $tanggal_awal = $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');
            $durasi = $this->input->post('durasi');


            $data = array(
                'kegiatan' => $kegiatan,
                'tanggal_awal' => $tanggal_awal,
                'tanggal_akhir' => $tanggal_akhir,
                'durasi' => $durasi
                );
            $this->m_data->input_data3($data,'wbs');
            redirect('crud/index3');
        }

        function edit3($wbs_code){
            $where = array('wbs_code' => $wbs_code);
            $data['wbs'] = $this->m_data->edit_data3($where,'wbs')->result();
            $this->load->view('edit_v3',$data);
        }

        function update3(){
            $wbs_code = $this->input->post('wbs_code');
            $kegiatan = $this->input->post('kegiatan');
            $tanggal_awal = $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');
            $durasi = $this->input->post('durasi');
         
            $data = array(
                'kegiatan' => $kegiatan,
                'tanggal_awal' => $tanggal_awal,
                'tanggal_akhir' => $tanggal_akhir,
                'durasi' => $durasi
            );
         
            $where = array(
                'wbs_code' => $wbs_code
            );
         
            $this->m_data->update_data3($where,$data,'wbs');
            redirect('crud/index3');
        }

        function hapus3($wbs_code){
            $where = array('wbs_code' => $wbs_code);
            $this->m_data->hapus_data($where,'wbs');
            redirect('crud/index3');
        }

        //spreadsheet

        function spreadsheet_wbs(){
            $this->load->view('Spreadsheet/wbs');
        }

        //pdf

        function pdf_wbs(){
            $this->load->view('pdf_wbs');
        }

//grafik

        function grafik(){

            
            //echo "ini adalah method index di controller crud";
            $data['tbl_timesheet'] = $this->m_data->tampil_grafik()->result();
            $this->load->view("grafik",$data);
        }
        function index_upload(){
            $this->load->view('folder_upload/drive_upload');
        }
        // tampilan login
        function index_login(){
            $this->load->view('login/login');
            }

        }

    


?>