<?php
class Model_materia extends CI_Model { 

    public function __construct() {
    	parent::__construct();
   	}

	public function getUser($usuario){
   		$this->db->select('nombre, apellido, foto');
   		return $this->db->get_where('usuarios', array('id_usuario' => $usuario))->row();
   	}
   	
   	public function egreso($fecha, $cantidad, $usuario, $materia, $id_orden = NULL, $id_produccion = NULL) {   	
	   	//obtengo el numero de egreso para la materia prima actual
	   	$this->db->select('MAX(id_egreso) as max');
	    $this->db->from('egresos_aridos');
	    $this->db->where('id_materia', $materia);
	    $consulta = $this->db->get();
		$fila = $consulta->row_array();
		$egreso = 1 + $fila['max'];   		
		//insert en la base de datos
		$data = array(
	               'id_materia' => $materia,
	               'id_egreso' => $egreso,
	               'fecha' => $fecha,
	               'consumo' => $cantidad,
	               'id_usuario' => $usuario,
	               'id_orden_produccion' => $id_orden,
	               'id_produccion' => $id_produccion
	            );
		$this->db->insert('egresos_aridos', $data); 
    }

   	public function ingreso($fecha, $cantidad, $remito, $proveedor, $precio ,$usuario, $materia) {   	
	   	//obtengo el numero de ingreso para la materia prima actual
	   	$this->db->select('MAX(id_ingreso) as max');
	    $this->db->from('ingresos_aridos');
	    $this->db->where('id_materia', $materia);
	    $consulta = $this->db->get();
		$fila = $consulta->row_array();
		$ingreso = 1 + $fila['max'];   		
		//insert en la base de datos
		$data = array(
	               'id_materia' => $materia,
	               'id_ingreso' => $ingreso,
	               'id_proveedor' => $proveedor,
	               'nro_remito' => $remito,
	               'cantidad' => $cantidad,
	               'fecha' => $fecha,
	               'precio' => $precio,
	               'id_usuario' => $usuario
	            );
		$this->db->insert('ingresos_aridos', $data); 
	}

   	public function getProveedores(){
   		return $this->db->get('proveedores')->result();		
   	}

   	public function getSilos(){
   		return $this->db->get('silos')->result();		
   	}

   	public function getTabla($materia, $mes, $anio, $proveedor){
   		$prov = '';
   		if($proveedor != -1) $prov = " AND i.id_proveedor = ".$proveedor;
		$query = $this->db->query("SELECT DATE_FORMAT(i.fecha,'%e') as dia, p.nombre, i.nro_remito, i.cantidad, i.id_materia, i.id_ingreso, i.precio, i.id_proveedor
									FROM ingresos_aridos i, proveedores p 
									WHERE i.id_proveedor = p.id_proveedor AND i.id_materia = $materia AND YEAR(i.fecha) = $anio AND MONTH(i.fecha) = $mes".$prov." ORDER BY i.fecha");
	    $tabla = $query->result();
	    $query = $this->db->query("SELECT DATE_FORMAT(e.fecha,'%e') as dia, e.consumo 
									FROM egresos_aridos e
									WHERE e.id_materia = $materia AND e.consumo <> 0 AND YEAR(e.fecha) = $anio AND MONTH(e.fecha) = $mes ORDER BY e.fecha");
	    $tabla = array_merge($tabla,$query->result());
	    foreach ($tabla as $key => $row) {
    		$aux[$key] = $row->dia;
		}
		if(isset($aux))		
			array_multisort($aux, SORT_ASC, $tabla);
	    return $tabla;
	}

	public function egresoCemento($fecha, $cantidad, $silo, $usuario, $id_orden = NULL, $id_produccion = NULL) {   	
	   	//obtengo el numero de egreso para la materia prima actual
	   	$this->db->select('MAX(id_egreso) as max');
	    $this->db->from('egresos_cemento');
	    $this->db->where('id_silo', $silo);
	    $consulta = $this->db->get();
		$fila = $consulta->row_array();
		$egreso = 1 + $fila['max'];   		
		//insert en la base de datos
		$data = array(
	               'id_silo' => $silo,
	               'id_egreso' => $egreso,
	               'fecha' => $fecha,
	               'consumo' => $cantidad,
	               'id_usuario' => $usuario,
	               'id_orden_produccion' => $id_orden,
	               'id_produccion' => $id_produccion
	            );
		$this->db->insert('egresos_cemento', $data); 
    }

    public function ingresoCemento($fecha, $origen, $fabrica, $remito, $silo, $precio ,$usuario) {   	
	   	//obtengo el numero de ingreso para la materia prima actual
	   	$this->db->select('MAX(id_ingreso) as max');
	    $this->db->from('ingresos_cemento');
	    $this->db->where('id_silo', $silo);
	    $consulta = $this->db->get();
		$fila = $consulta->row_array();
		$ingreso = 1 + $fila['max'];   		
		//insert en la base de datos
		$data = array(
	               'id_silo' => $silo,
	               'id_ingreso' => $ingreso,
	               'fecha' => $fecha,
	               'nro_factura' => $remito,
	               'kg_origen' => $origen,
	               'kg_fabrica' => $fabrica,
	               'precio' => $precio,
	               'id_usuario' => $usuario
	            );
		$this->db->insert('ingresos_cemento', $data); 
   	}

   	public function getTablaCemento($mes, $anio, $silo){
   		$query = $this->db->query("SELECT DATE_FORMAT(i.fecha,'%e') as dia, s.nombre, i.nro_factura, i.id_silo, i.precio, i.id_ingreso, i.kg_origen, i.kg_fabrica, (i.kg_origen-i.kg_fabrica) as dif 
									FROM ingresos_cemento i, silos s 
									WHERE i.id_silo = s.id_silo AND YEAR(i.fecha) = $anio AND MONTH(i.fecha) = $mes AND i.id_silo = $silo ORDER BY i.fecha");
	    $tabla = $query->result();
	    $query = $this->db->query("SELECT DATE_FORMAT(e.fecha,'%e') as dia, e.consumo, s.nombre 
									FROM egresos_cemento e, silos s
									WHERE e.id_silo = s.id_silo AND e.consumo <> 0 AND e.id_silo = $silo AND YEAR(e.fecha) = $anio AND MONTH(e.fecha) = $mes ORDER BY e.fecha");
	    $tabla = array_merge($tabla,$query->result());
	    foreach ($tabla as $key => $row) {
    		$aux[$key] = $row->dia;
		}
		if(isset($aux))		
			array_multisort($aux, SORT_ASC, $tabla);
	    return $tabla;
	}

	public function getStockCemento($silo) {
		$this->db->select('SUM(kg_fabrica) as sum');
	    $this->db->from('ingresos_cemento');
	    $this->db->where('id_silo', $silo);
	    $consulta = $this->db->get()->row();
		$ingresos = $consulta->sum;
		$this->db->select('SUM(consumo) as sum');
	    $this->db->from('egresos_cemento');
	    $this->db->where('id_silo', $silo);
	    $consulta = $this->db->get()->row();
		$egresos = $consulta->sum;
		return $ingresos-$egresos;		
	}

	public function getStockMateria($materia){
		$this->db->select('SUM(cantidad) as sum');
	    $this->db->from('ingresos_aridos');
	    $this->db->where('id_materia', $materia);
	    $consulta = $this->db->get()->row();
		$ingresos = $consulta->sum;
		$this->db->select('SUM(consumo) as sum');
	    $this->db->from('egresos_aridos');
	    $this->db->where('id_materia', $materia);
	    $consulta = $this->db->get()->row();
		$egresos = $consulta->sum;
		return $ingresos-$egresos;		
	}


	public function getStockMateriaMaximo($materia){
		$this->db->select('capacidad_max');
	    $this->db->from('materia_prima');
	    $this->db->where('id_materia', $materia);
	    return  $this->db->get()->row()->capacidad_max;
	}

	public function eliminar($id_materia, $ingreso)
	{
		$this->db->where('id_materia', $id_materia);
		$this->db->where('id_ingreso', $ingreso);
		$this->db->delete('ingresos_aridos');
	}

	public function eliminar_cemento($id_silo, $ingreso)
	{
		$this->db->where('id_silo', $id_silo);
		$this->db->where('id_ingreso', $ingreso);
		$this->db->delete('ingresos_cemento');
	}

	public function editar($id_materia, $id_ingreso, $fecha, $cantidad, $remito, $proveedor, $precio)
	{
		$this->db->set('fecha', $fecha);
		$this->db->set('cantidad', $cantidad);
		$this->db->set('precio', $precio);
		$this->db->set('id_proveedor', $proveedor);
		$this->db->set('nro_remito', $remito);

		$this->db->where('id_materia', $id_materia);
		$this->db->where('id_ingreso', $id_ingreso);
		$this->db->update('ingresos_aridos');

	}

	public function editar_cemento($id_silo, $id_ingreso, $fecha, $kgo, $kgd, $remito, $precio)
	{
		$this->db->set('fecha', $fecha);
		$this->db->set('kg_origen', $kgo);
		$this->db->set('kg_fabrica', $kgd);
		$this->db->set('nro_factura', $remito);
		$this->db->set('precio', $precio);

		$this->db->where('id_silo', $id_silo);
		$this->db->where('id_ingreso', $id_ingreso);
		$this->db->update('ingresos_cemento');

	}

	public function delete_egresos($id_orden)
	{
		$this->db->delete('egresos_aridos', array('id_orden_produccion' => $id_orden));
		$this->db->delete('egresos_cemento', array('id_orden_produccion' => $id_orden));
	}

	public function getConsumosAridos($id_orden)
	{
		$this->db->select('*');
	    $this->db->from('egresos_aridos');
	    $this->db->where('id_orden_produccion', $id_orden);
	    return  $this->db->get()->result();
	}

	public function getConsumosCemento($id_orden)
	{
		$this->db->select('*');
	    $this->db->from('egresos_cemento');
	    $this->db->where('id_orden_produccion', $id_orden);
	    return  $this->db->get()->result();
	}
}
?>