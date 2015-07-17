<?php
class lead extends CI_Model {
     function get_all_leads($num='')
     {
         return $this->db->query("SELECT * FROM leads ".$num)->result_array();
     }

     function ultimate_leads($lead_name, $from, $date, $page='')
     {
        return $this->db->query("SELECT * FROM leads WHERE first_name LIKE ? AND registered_datetime > ? AND registered_datetime < ? ".$page, array('%'.$lead_name.'%', $from, $date))->result_array();
     }

}
?>