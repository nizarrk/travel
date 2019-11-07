<?php defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends CI_Model
{
    private $_table = "notifikasi";

    public  $id_notifikasi,
            $id_user,
            $tipe_notifikasi,
            $desk_notifikasi,
            $status_notifikasi;

    function notifCountAdmin() {
        $this->db->where('id_user', 1);
        $this->db->where('status_notifikasi', 'Aktif');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function notifCountUser($id) {
        $this->db->where('id_user', $id);
        $this->db->where('status_notifikasi', 'Aktif');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getNotifAdmin() {
        $this->db->where('id_user', 1);
        $this->db->order_by('id_notifikasi', 'desc');
        $this->db->limit(5);
        $query = $this->db->get($this->_table)->result();
        
        return $query;
    }

    function getNotifUser($id) {
        $this->db->where('id_user', $id);
        $this->db->order_by('id_notifikasi', 'desc');
        $this->db->limit(5);
        $query = $this->db->get($this->_table)->result();
        return $query;
    }

    function getNotifAdminAll() {
        $this->db->where('id_user', 1);
        $this->db->order_by('id_notifikasi', 'desc');
        $query = $this->db->get($this->_table)->result();
        
        return $query;
    }

    function getNotifUserAll($id) {
        $this->db->where('id_user', $id);
        $this->db->order_by('id_notifikasi', 'desc');
        $query = $this->db->get($this->_table)->result();
        return $query;
    }

    public function updateStatus($id) {
        $this->id_notifikasi = $id;
        $this->status_notifikasi = "Tidak Aktif";
        $this->db->update($this->_table, array('status_notifikasi' => $this->status_notifikasi), array('id_notifikasi' => $this->id_notifikasi));
    }
    
    public function deleteOldNotif() {
        return $this->db->query("DELETE FROM notifikasi WHERE tgl_notifikasi < NOW() - INTERVAL 30 DAY;");
    }

    public function create($kode, $tipe, $status, $id = 1) {
        $this->id_user = $id;
        $this->tipe_notifikasi = $tipe;
        $this->status_notifikasi = "Aktif";
        if ($id != 1) {
            $this->desk_notifikasi = "$tipe anda dengan kode '" . $kode . "' telah $status.";
        } else {
            $this->desk_notifikasi = "Ada $tipe baru dengan kode '" . $kode . "'";
        }
        $this->db->insert($this->_table, $this);
    }

}