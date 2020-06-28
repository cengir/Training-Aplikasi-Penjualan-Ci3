<?php
Class M_lap_penjualan extends CI_Model{

    public function get_penjualan($jual_kode, $from_date, $to_date)
    {
        $this->db->select("*");
        $this->db->from("tr_penjualan");
        if($jual_kode != ""){
            $this->db->where("jual_kode", $jual_kode);
        }
        if($from_date != ""){
            $this->db->where("CAST(jual_tanggal as DATE) >=", $from_date);
        }
        if($to_date != ""){
            $this->db->where("CAST(jual_tanggal as DATE) <=", $to_date);
        }
        $query = $this->db->get()->result();

        return $query;
    }

    public function get_penjualan_detail($kode)
    {
        $query = $this->db->query("select a.*,b.* 
        from tr_penjualandetail a
        inner join m_barang b on a.brg_id=b.brg_id
        where jual_kode='$kode'")->result();

        return $query;
    }

}