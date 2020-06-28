<?php
Class M_function extends CI_Model{

    public function autonumb($table, $field, $code){

        $year = date('Y');
        $month = date('m');
        $q = $this->db->query("SELECT max(right(".$field.",3)) AS idmax FROM ".$table." where YEAR(jual_tanggal)='".$year."' and MONTH(jual_tanggal)='".$month."'");
        $urut = ""; //no urut
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
				
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $urut = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $urut = "001";
        }
        //gabungkan string dengan kode yang telah dibuat tadi
        return $code.$year.$month.$urut;
    }

}