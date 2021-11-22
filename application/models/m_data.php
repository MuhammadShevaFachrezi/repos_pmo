<?php

    class m_data extends CI_Model{

        //registrasi
        function tambahregistrasi_data($data,$table){
            $this->db->insert($table,$data);
        }

        //login
        function cek_login($table,$where){		
            return $this->db->get_where($table,$where);
        }

        //tabel timesheet
        function tampil_data(){
            return $this->db->get('tbl_timesheet');
        }

        function input_data($data,$table){
            $this->db->insert($table,$data);
        }

        function edit_data($where,$table){		
            return $this->db->get_where($table,$where);
        }

        function update_data($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        function hapus_data($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        //tbl penugasan
        function tampil_data2(){
            return $this->db->get('data_penugasan');
        }

        function input_data2($data,$table){
            $this->db->insert($table,$data);
        }

        function edit_data2($where,$table){		
            return $this->db->get_where($table,$where);
        }

        function update_data2($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        function hapus_data2($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        //tabel wbs
        function tampil_data3(){
            return $this->db->get('wbs');
        }

        function input_data3($data,$table){
            $this->db->insert($table,$data);
        }

        function edit_data3($where,$table){		
            return $this->db->get_where($table,$where);
        }

        function update_data3($where,$data,$table){
            $this->db->where($where);
            $this->db->update($table,$data);
        }

        function hapus_data3($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        //grafik
        function tampil_grafik(){
            return $this->db->get('tbl_timesheet');
        }
            //upload_drive
            function tampil_upload4(){
                return $this->db->get('wbs');
            }
        }
    


?>