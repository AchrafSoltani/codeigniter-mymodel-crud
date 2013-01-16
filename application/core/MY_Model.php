<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Simple CRUD Model for Codeigniter
 *
 * @file        MY_Model.php
 * @package     Codeigniter
 * @subpackage  core
 * @category    Database
 * @date        12/13/12 - 3:06 PM
 * @author      Achraf Soltani <contact@achrafsoltani.com>
 * @link        http://www.achrafsoltani.com
 */


class MY_Model extends CI_Model
{
    protected $table;

    function __construct()
    {
        parent::__construct();
    }

    public function setTable($_table)
    {
        $this->table = $_table;
    }

    public function get($where = null, $singleton = false, $limit = null, $offset = null)
    {
        $query = null;

        if($where == null)
        {
            $query = $this->db->get($this->table, $limit, $offset);
            if($query->num_rows() > 0)
            {
                if($singleton)
                {
                    $data = $query->result();
                    return $data[0];
                }
                else
                {
                    return $query->result();
                }
            }
            else return false;
        }
        else
        {
            $query = $this->db->get_where($this->table, $where, $limit, $offset);
            if($query->num_rows() > 0)
            {
                if($singleton)
                {
                    $data = $query->result();
                    return $data[0];
                }
                else
                {
                    return $query->result();
                }
            }
            else return false;
        }
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function edit($conditions, $data)
    {
        $this->db->where($conditions);
        $this->db->update($this->table, $data);
    }

    public function delete($condition)
    {
        $this->db->delete($this->table, $condition);
    }
}
 