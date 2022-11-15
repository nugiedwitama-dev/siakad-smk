<?php

function cekNilai($nis,$kode,$nil){

    $nilai = get_instance();
    $nilai->load->model('transkrip_model');

    $nilai->db->select('*');
    $nilai->db->from('transkrip_nilai');
    $nilai->db->where('nis',$nis);
    $nilai->db->where('kode_mapel','$kode');
    $query= $nilai->db->get()->row();

    if($query!=null){
        if($nil < $query->nilai){
            $nilai->db->set('nilai',$nil)
                      ->where('nis',$nis)
                      ->where('kode_mapel',$kode);
        }else{
            $data = array(
                'nis' => $nis,
                'nilai' => $nil,
                'kode_mapel' => $kode
            );

            $nilai->transkrip_model->insert($data);
        }
    }
}