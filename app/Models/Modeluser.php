<?php
class Modeluser extends Model
{
    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('user');
        return $query->row();
    }
}
