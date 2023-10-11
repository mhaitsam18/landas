<?php

class Status_model extends CI_model
{
    public function getAllStatus()
    {
        return $this->db->get('status')->result_array();
    }

    public function getStatus()
    {
        return $this->db->get('status')->result();
    }
}
