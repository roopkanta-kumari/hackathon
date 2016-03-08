<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage_model extends CI_Model {
       public function list_table($tablename) {
        return $this->db->select('*')
                    ->from($tablename)
                    ->get()
                    ->result();
    }
        //List table orderby
    public function list_table_orderby($tablename,$orderby_column,$orderby_value='asc') {
        return $this->db->select('*')
                    ->from($tablename)
                    ->order_by($orderby_column,$orderby_value)
                    ->get()
                    ->result();
    }
      public function update_table_where2($tablename,$array,$col1,$val1,$col2,$val2)
    {
        $this->db->where($col1,$val1);
        $this->db->where($col2,$val2);
        $this->db->update($tablename,$array);
    }
        public function get_from_table($tablename,$columnname,$value){
        
        return $this->db->select('*')
                        ->from($tablename)
                        ->where($columnname,$value)
                        ->get()
                        ->result();
    }
      public function get_from_table_where2($tablename,$col1,$val1,$col2,$val2){
        
        return $this->db->select('*')
                        ->from($tablename)
                        ->where($col1,$val1)
                        ->where($col2,$val2)
                        ->get()
                        ->result();
    }
    
     //Add to table : return inserted id
    public function add_to_table($tablename,$array)
    {
        $this->db->insert($tablename,$array);
        return $this->db->insert_id();
    }
      public function update_table($tablename,$array,$columnname,$value)
    {
        $this->db->where($columnname,$value);
        $this->db->update($tablename,$array);
    }
       public function delete_table($tablename, $columnname, $value)
    {
        $this->db->where($columnname,$value);
        $this->db->delete($tablename);
    }
      public function delete_table_where2($tablename, $col1, $value1, $col2, $value2)
    {
        $this->db->where($col1,$value1);
        $this->db->where($col2,$value2);
        $this->db->delete($tablename);
    }
      //Common Select
    public function select_row($where,$table,$select) {
        return $this->db->select($select)
                        ->from($table)
                        ->where($where)
                        ->get()
                        ->row();
    }
      //Two tables Join
    public function select_join_query($where,$select,$table,$join_table,$join_condition) {
      return $this->db->select($select)
                        ->from($table)
                        ->join($join_table,$join_condition)
                        ->where($where)
                        ->get()
                        ->result();
    }
}