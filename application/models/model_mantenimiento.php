<?php
class Model_mantenimiento extends CI_Model { 

    public function __construct() {
    	parent::__construct();
   	}

   	public function getSolicitudes() 
   	{
		return $this->db->order_by("fecha", "asc")->get_where('solicitudes_mantenimiento', array('estado' => 0))->result();
	}

	public function getDetalles() 
	{
		return $this->db->get('mantenimiento_detalle')->result();
	}

	public function ingreso_orden($fecha, $descripcion, $tiempo, $id_usuario) 
	{
   		$data = array(
	               'fecha' => $fecha,
	               'id_usuario' => $id_usuario,
	            );
		$this->db->insert('solicitudes_mantenimiento', $data); 
		$idOrden = $this->db->insert_id();

		foreach($descripcion as $key=>$val) {
            $data = array(
            		   'id_mantenimiento' => ($key+1),
		               'dias' => $tiempo[$key],
		               'descripcion' => $val,
		               'id_solicitud' => $idOrden
		            );
			$this->db->insert('mantenimiento_detalle', $data); 
        }
        return $idOrden;
	}

	public function update_produccion($id, $detalle, $verificado, $fecha, $comentario, $usuario)
	{
		/*$data = array(
               'estado' => 1
            );
		$this->db->where('id_solicitud', $id);
		$this->db->update('solicitudes_mantenimiento', $data);*/

		foreach($detalle as $key=>$val) {            
			foreach ($verificado as $v) {
				if($val == $v){ $e = 1; break;}
				else $e=0;
			}
			
			if($fecha[$key] <> '')
				$fechaI = date('Y-m-d',strtotime($fecha[$key]));
			else
				$fechaI = NULL;

			$data = array(
	               'estado' => $e,
	               'id_usuario' => $usuario,
	               'fecha_cierre' => $fechaI,
	               'comentarios' => $comentario[$key]
	            );
			$this->db->where('id_mantenimiento', $val);
			$this->db->where('id_solicitud', $id);
			$this->db->update('mantenimiento_detalle', $data); 
		}
	}
}
