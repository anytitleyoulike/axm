<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Fornecedor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fornecedor_model');
    } 

    /*
     * Listing of fornecedor
     */
    function index()
    {
        $data['fornecedor'] = $this->Fornecedor_model->get_all_fornecedor();
        $this->load->view('fornecedor/index',$data);
    }

    /*
     * Adding a new fornecedor
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','min_length[3]|required');
		$this->form_validation->set_rules('cpf','Cpf','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('fone','Fone','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nome' => $this->input->post('nome'),
				'fone' => $this->input->post('fone'),
				'email' => $this->input->post('email'),
				'cpf' => $this->input->post('cpf'),
            );
            
            $fornecedor_id = $this->Fornecedor_model->add_fornecedor($params);
            redirect('fornecedor/index');
        }
        else
        {
            $this->load->view('fornecedor/add');
        }
    }  

    /*
     * Editing a fornecedor
     */
    function edit($id)
    {   
        // check if the fornecedor exists before trying to edit it
        $fornecedor = $this->Fornecedor_model->get_fornecedor($id);
        
        if(isset($fornecedor['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','min_length[3]|required');
			$this->form_validation->set_rules('cpf','Cpf','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('fone','Fone','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nome' => $this->input->post('nome'),
					'fone' => $this->input->post('fone'),
					'email' => $this->input->post('email'),
					'cpf' => $this->input->post('cpf'),
                );

                $this->Fornecedor_model->update_fornecedor($id,$params);            
                redirect('fornecedor/index');
            }
            else
            {   
                $data['fornecedor'] = $this->Fornecedor_model->get_fornecedor($id);
    
                $this->load->view('fornecedor/edit',$data);
            }
        }
        else
            show_error('The fornecedor you are trying to edit does not exist.');
    } 

    /*
     * Deleting fornecedor
     */
    function remove($id)
    {
        $fornecedor = $this->Fornecedor_model->get_fornecedor($id);

        // check if the fornecedor exists before trying to delete it
        if(isset($fornecedor['id']))
        {
            $this->Fornecedor_model->delete_fornecedor($id);
            redirect('fornecedor/index');
        }
        else
            show_error('The fornecedor you are trying to delete does not exist.');
    }
    
}
