<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function create_task($user_id, $title, $description, $priority, $due_date, $status) {
        $data = array(
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'priority' => $priority,
            'due_date' => $due_date,
            'status' => $status
        );
        return $this->db->insert('tasks', $data);
    }

	public function update_task($task_id, $data) {
		
		if (empty($data)) {
			return false; 
		}
	
		return $this->db->update('tasks', $data, ['id' => $task_id]);
	}
	
	public function get_task_by_id($task_id) {
		
		return $this->db->get_where('tasks', ['id' => $task_id])->row_array();
	}
	

    public function get_tasks($user_id) {
        return $this->db->get_where('tasks', ['user_id' => $user_id])->result_array();
    }

    

    public function delete_task($task_id) {
        return $this->db->delete('tasks', ['id' => $task_id]);
    }



	public function get_filtered_tasks($search = '', $status = '', $priority = '') {
		
		$this->db->select('*');
		$this->db->from('tasks');
	
	
		if (!empty($search)) {
			$this->db->like('title', $search);  
		}
	
	
		if (!empty($status)) {
			$this->db->where('status', $status);
		}
	
	
		if (!empty($priority)) {
			$this->db->where('priority', $priority);
		}
	
		
		return $this->db->get()->result_array();
	}
	
	

}
?>
