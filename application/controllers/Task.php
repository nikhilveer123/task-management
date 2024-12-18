<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Task_model');
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
    }



	public function list() {
		
		if (!$this->session->userdata('user_id')) {
			redirect('auth/login');
		}
	
	
		$search = $this->input->get('title');  
		$status = $this->input->get('status'); 
		$priority = $this->input->get('priority'); 
	
	
		$data['tasks'] = $this->Task_model->get_filtered_tasks($search, $status, $priority);
	
		
		$data['title'] = $search;
		$data['status'] = $status;
		$data['priority'] = $priority;
	
		
		$this->load->view('task/list', $data);
	}
	

    public function create() {
        $this->load->view('task/create');
    }
	
	public function store() {
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('priority', 'Priority', 'required');
		$this->form_validation->set_rules('due_date', 'Due Date', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('task/create');
		} else {
			
			$user_id = $this->session->userdata('user_id'); 
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$priority = $this->input->post('priority');
			$due_date = $this->input->post('due_date');
			$status = $this->input->post('status');
	
			$this->Task_model->create_task($user_id, $title, $description, $priority, $due_date, $status);
			$this->session->set_flashdata('success', 'Task created successfully.');				
			redirect('task/list');
		}
	}

	

    public function edit($task_id) {
        $task = $this->Task_model->get_task_by_id($task_id);
        $this->load->view('task/edit', ['task' => $task]);
    }



	public function update($id) {
		
		$task = $this->Task_model->get_task_by_id($id);
		
		
		if (!$task) {
		
			redirect('task/list');
		}
	
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('priority', 'Priority', 'required');
		$this->form_validation->set_rules('due_date', 'Due Date', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
	
	
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('task/edit', ['task' => $task]);
		} else {
			
			$data = [
				'title' => $this->input->post('title'),
				'priority' => $this->input->post('priority'),
				'due_date' => $this->input->post('due_date'),
				'status' => $this->input->post('status'),
				'description' => $this->input->post('description')
			];
	
			
			$this->Task_model->update_task($id, $data);
						
			$this->session->set_flashdata('success', 'Task updated successfully.');
				
			redirect('task/list');
		}
	}

	public function view($task_id) {
		
		$task = $this->Task_model->get_task_by_id($task_id);
		
		if (!$task) {
		
			$this->session->set_flashdata('error', 'Task not found');
			redirect('task');
		}
		
		
		$data['task'] = $task;
		$this->load->view('task/view', $data);
	}
	
	

    public function delete($task_id) {
        if ($this->Task_model->delete_task($task_id)) {
            $this->session->set_flashdata('success', 'Task deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete task');
        }
        redirect('task/list');
    }


}
?>
