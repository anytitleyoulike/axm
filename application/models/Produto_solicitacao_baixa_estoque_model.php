<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Produto_solicitacao_baixa_estoque_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get produto_solicitacao_baixa_estoque by di
     */
    function get_produto_solicitacao_baixa_estoque($di)
    {
        $this->db->select('baixa.di,baixa.quantidade, u.nome_usuario,u.id as id_usuario,p.id as produto_id,p.nome as produto');
        $this->db->join('usuario u ','u.id = baixa.usuario_id');
        $this->db->join('produto p ','p.id = baixa.produto_id');
        return $this->db->get_where('produto_solicitacao_baixa_estoque baixa',array('di'=>$di))->row_array();
    }
    
    /*
     * Get all produto_solicitacao_baixa_estoque
     */
    function get_all_produto_solicitacao_baixa_estoque()
    {
        
        $this->db->select('baixa.di,baixa.quantidade, u.nome_usuario,produto.nome as produto');
        $this->db->join('usuario u ','u.id = baixa.usuario_id');
        $this->db->join('produto','produto.id = baixa.produto_id');

        return $this->db->get('produto_solicitacao_baixa_estoque baixa')->result_array();
    }
    
    /*
     * function to add new produto_solicitacao_baixa_estoque
     */
    function add_produto_solicitacao_baixa_estoque($params)
    {
        $this->db->insert('produto_solicitacao_baixa_estoque',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update produto_solicitacao_baixa_estoque
     */
    function update_produto_solicitacao_baixa_estoque($id,$params)
    {
        $this->db->where('di',$id['baixa_id']);
        $this->db->where('produto_id',$id['produto_id']);
        $this->db->update('produto_solicitacao_baixa_estoque',$params);
    }
    
    /*
     * function to delete produto_solicitacao_baixa_estoque
     */
    function delete_produto_solicitacao_baixa_estoque($di)
    {
        $this->db->delete('produto_solicitacao_baixa_estoque',array('di'=>$di));
    }
}
