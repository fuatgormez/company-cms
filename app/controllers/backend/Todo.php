<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(BACKEND.'Model_common');
        $this->load->model(BACKEND.'Model_todo');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->get_setting_data();
        $data['todo'] = $this->Model_todo->show();

        $this->load->view(BACKEND.'header',$data);
        $this->load->view(BACKEND.'todo/todo',$data);
        $this->load->view(BACKEND.'footer');
    }

    public function add()
    {
        $data['setting'] = $this->Model_common->get_setting_data();

        $error = '';
        $success = '';

        if(isset($_POST['form1'])) {

            $valid = 1;

            $this->form_validation->set_rules('todo_title', 'TODO title', 'trim|required');
            $this->form_validation->set_rules('todo_content', 'TODO content', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error = validation_errors();
            }

            if($valid == 1)
            {
                $form_data = array(
                    'todo_title'     => $this->input->post('todo_title'),
                    'todo_content'   => $this->input->post('todo_content')
                );

                $this->Model_todo->add($form_data);

                $success = 'TODO is added successfully!';
                $this->session->set_flashdata('success',$success);

                $form_data[] = 	array_push($form_data, array('csrf_fg' => $this->security->get_csrf_hash(), 'responseMessage'=> $success, 'url'=> base_url(BACKEND.'todo')));

                echo json_encode($form_data);
            }
            else
            {
                $this->session->set_flashdata('error',$error);
                redirect(base_url(BACKEND.'todo'));
            }

        } else {
            $this->load->view(BACKEND.'header',$data);
            $this->load->view(BACKEND.'todo/todo_add',$data);
            $this->load->view(BACKEND.'footer');
        }

    }


    public function edit($id)
    {

        // If there is no TODO in this id, then redirect
        $tot = $this->Model_todo->todo_check($id);
        if(!$tot) {
            redirect(base_url(BACKEND.'todo'));
            exit;
        }

        $data['setting'] = $this->Model_common->get_setting_data();
        $error = '';
        $success = '';


        if(isset($_POST['form1']))
        {

            $valid = 1;

            $this->form_validation->set_rules('todo_title', 'TODO title', 'trim|required');
            $this->form_validation->set_rules('todo_content', 'TODO content', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error = validation_errors();
            }

            if($valid == 1)
            {
                $data['todo'] = $this->Model_todo->getData($id);

                $form_data = array(
                    'todo_title'     => $this->input->post('todo_title'),
                    'todo_content'   => $this->input->post('todo_content')
                );
                $this->Model_todo->update($id,$form_data);

                $success = 'TODO is updated successfully';
                $this->session->set_flashdata('success',$success);
                redirect(base_url(BACKEND.'todo'));
            } else {
                $this->session->set_flashdata('error',$error);
                redirect(base_url(BACKEND.'todo'));
            }


        } else {
            $data['todo'] = $this->Model_todo->getData($id);
            $this->load->view(BACKEND.'header',$data);
            $this->load->view(BACKEND.'todo/todo_edit',$data);
            $this->load->view(BACKEND.'footer');
        }

    }

    public function delete($id)
    {
        // If there is no TODO in this id, then redirect
        $tot = $this->Model_todo->todo_check($id);
        if(!$tot) {
            redirect(base_url(BACKEND.'todo'));
        }

        
        
        var_dump($this->config->item('cache_query_string'));
        exit();
        
        $delete = $this->Model_todo->delete($id);
        if($delete){
            $this->output->clear_all_cache();
            $success = 'TODO is deleted successfully';
            $this->session->set_flashdata('success',$success);
            redirect(base_url(BACKEND.'todo'));
            
        } else {
            $error = 'an error occurred!';
            $this->session->set_flashdata('error',$error);
        }
    }

}