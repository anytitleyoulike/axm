<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Produto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get produto by id
     */
    function get_produto($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('produto')->row_array();
    }  
    function get_produto_no_estoque()
    {
            $this->db->select('p.id,p.nome, c.quantidade, c.value_product, c.fornecedor_id, c.data_criacao');
            $this->db->from('produto p');
            $this->db->join('compra c', 'p.id = c.produto_id');
            $this->db->where('c.quantidade > 0');
        return $this->db->get()->result_array();
    }
    
    /*
     * Get all produto
     */
    function get_all_produto()
    {
        return $this->db->get('produto')->result_array();
    }
    
    /*
     * function to add new produto
     */
    function add_produto($params)
    {
        $this->db->insert('produto',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update produto
     */
    function update_produto($id,$params)
    {
        $this->db->where('id',$id);
        $this->db->update('produto',$params);
    }
    
    /*
     * function to delete produto
     */
    function delete_produto($id)
    {
        $this->db->delete('produto',array('id'=>$id));
    }

    function estaSalvo($produto) {
        $this->db->where("nome",$produto);
        $query = $this->db->get("produto");
        
        if ($query->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}
