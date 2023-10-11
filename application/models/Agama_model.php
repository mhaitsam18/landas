<?php

class Agama_model extends CI_model
{
    public function getAllAgama()
    {
        return $this->db->get('agama')->result_array();
    }

    public function getAgama()
    {
        return $this->db->get('agama')->result();
    }
}
