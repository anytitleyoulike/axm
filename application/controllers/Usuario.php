<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    function index()
    {
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        $this->load->view('cabecalho');
        $this->load->view('usuario/index',$data);
    }

    function add()
    {   
        $this->load->library('form_validation');
        $this->load->model("usuario_model");
        
        $this->form_validation->set_rules('nome_usuario','Usuário','required|callback_usuario_existente');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'data_criacao' => date('Y-m-d'),
                'nome_usuario' => $this->input->post('nome_usuario'),
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {
            $this->load->view('cabecalho');
            $this->load->view('usuario/add');
        }
    }  


    function edit($id)
    {   
        
        $this->load->model("usuario_model");
        $usuario = $this->Usuario_model->get_usuario($id);
        
        if(isset($usuario['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nome_usuario','Nome Usuario','required|callback_usuario_existente');
            
            if($this->form_validation->run())     
            {   
                $params = array(
                    'nome_usuario' => $this->input->post('nome_usuario'),
                );

                $this->Usuario_model->update_usuario($id,$params);            
                redirect('usuario/index');
            }
            else
            {   
                $data['usuario'] = $this->Usuario_model->get_usuario($id);
                $this->load->view('cabecalho');
                $this->load->view('usuario/edit',$data);
            }
        }
        else
            show_error('O usuário não existe.');
    } 


    function remove($id)
    {
        $usuario = $this->Usuario_model->get_usuario($id);

        if(isset($usuario['id']))
        {
            $this->Usuario_model->delete_usuario($id);
            redirect('usuario/index');
        }
        else
            show_error('O usuário que você quer deletar não existe.');
    }
    
    public function usuario_existente($usuario) {

        if ($this->usuario_model->estaSalvo($usuario)) {
            $this->form_validation->set_message("usuario_existente", "O nome {$usuario} já está cadastrado!");
            return FALSE;
        } else {
            return TRUE;
        }

    }
    
}
