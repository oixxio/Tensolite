<?php
class Model_deposito extends CI_Model { 

  public function __construct(){
    parent::__construct();
  }

  public function getUser($usuario){
      $this->db->select('nombre, apellido, foto');
      return $this->db->get_where('usuarios', array('id_usuario' => $usuario))->row();
  }

  public function getLugares(){
   		return $this->db->query("SELECT l.id_lugar,l.cantidad,l.medida,l.fila,l.columna,l.paquetes, 
   				(
   					IFNULL(	(SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)
   					-
   					IFNULL(	(SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)
   				)
   				 as cant 
   			FROM lugares l")->result();
	}

  public function ingreso($lugar, $cantidad, $ingreso, $usuario){
    $data = array(
                 'id_lugar' => $lugar,
                 'cantidad' => $cantidad,
                 'ingreso' => $ingreso,
                 'id_usuario' => $usuario
              );
    $this->db->insert('deposito', $data); 
  }

  public function getDespachos(){
    $this->db->select('*');
    $this->db->from('despachos');
    $this->db->where('visto', 0);
    $consulta = $this->db->get()->result();
    $this->db->query('UPDATE despachos SET visto = 1');
    return $consulta;
  }

  public function getProducciones(){
    $this->db->select('*');
    $this->db->from('producciones');
    $this->db->where('visto', 0);
    $consulta = $this->db->get()->result();
    $this->db->query('UPDATE producciones SET visto = 1');
    return $consulta;
  }

  public function getAS(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida <= 30");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/15648;  
  }
  public function getA1(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 30 AND l.medida <= 34");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/9408;  
  }
  public function getA2(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 34 AND l.medida <= 38");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/7056;  
  }
  public function getB1(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 38 AND l.medida <= 42");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/7056;  
  }
  public function getB2(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 42 AND l.medida <= 46");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/5880;  
  }
  public function getC(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 46 AND l.medida <= 54");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/8232;  
  }
  public function getD(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 54 AND l.medida <= 62");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/7776;  
  }
  public function getE(){
    $query = $this->db->query("SELECT l.medida,l.paquetes,l.cantidad,l.vigas_x_paq, 
      (IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) 
      - IFNULL((SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0)) as cant 
      FROM lugares l
      WHERE l.medida > 62 AND l.medida <= 82");
    $resultado = $query->result();
    $suma = 0;
    foreach ($resultado as $value) {
      if($value->paquetes == 0)
        $suma += $value->cant;
      else
        $suma += $value->cant*$value->vigas_x_paq;
    }
    return $suma*100/3960;  
  }

  public function hayDisponibles($id_lugar)
  {
    $query = $this->db->query("SELECT l.id_lugar, 
      ( IFNULL( (SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 1 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) - 
        IFNULL( (SELECT SUM(d.cantidad) FROM deposito d WHERE d.ingreso = 0 AND d.id_lugar = l.id_lugar GROUP BY d.id_lugar),0) ) 
      as cant FROM lugares l Where l.id_lugar = $id_lugar")->row();
    return $query->cant;
  }





  public function new_ingreso($cantidades, $medidas, $id_usuario, $id_orden = NULL)
  {
    foreach($cantidades as $key=>$cantidad) {            
      $data = array(
                 'cantidad' => $cantidad,
                 'medida' => $medidas[$key],
                 'ingreso' => 1,
                 'id_usuario' => $id_usuario,
                 'id_orden_produccion' => $id_orden
              );
      $this->db->insert('deposito_new', $data); 
    }
  }

  public function new_ingreso_recuperacion($cantidad, $medida, $id_usuario)
  {
      $data = array(
                 'cantidad' => $cantidad,
                 'medida' => $medida,
                 'ingreso' => 1,
                 'id_usuario' => $id_usuario,
                 'id_orden_produccion' => 0
              );
      $this->db->insert('deposito_new', $data); 
    
  }

  public function new_egreso($cantidades, $medidas, $id_usuario)
  {
    foreach($cantidades as $key=>$cantidad) {            
      $data = array(
                 'cantidad' => $cantidad,
                 'medida' => $medidas[$key],
                 'ingreso' => 0,
                 'id_usuario' => $id_usuario
              );
      $this->db->insert('deposito_new', $data); 
    }
  }

  public function new_egreso_perdida($cantidad, $medida, $id_usuario)
  {
              
      $data = array(
                 'cantidad' => $cantidad,
                 'medida' => $medida,
                 'ingreso' => 0,
                 'id_usuario' => $id_usuario,
                 'id_orden_produccion' => 0
              );
      $this->db->insert('deposito_new', $data); 
    
  }

  public function get_stock_x_medida($medida)
  {
    $query = $this->db->query("SELECT
      ( IFNULL( (SELECT SUM(cantidad) FROM deposito_new WHERE ingreso = 1 and medida=$medida) , 0 ) -
        IFNULL( (SELECT SUM(cantidad) FROM deposito_new WHERE ingreso = 0 and medida=$medida) , 0 ) ) as cant 
       ")->row();
    return $query->cant;
  }

  public function get_percent_x_medida($medida)
  {
    $cant = $this->get_stock_x_medida($medida);
    $this->db->select('maximo');
    $this->db->from('medidas');
    $this->db->where('medida', $medida);
    $maximo = $this->db->get()->row()->maximo;
    if($maximo > 0)
      return number_format( $cant * 100 / $maximo , 0);
    return "";
  }


  public function update_percents($medida, $maximo)
  {
    $this->db->query("UPDATE medidas SET maximo = $maximo WHERE medida = $medida");
  }

  public function get_maximos()
  {
    return $this->db->get('medidas')->result();
  }

  public function new_ingreso_delete_despacho($cantidad, $medida, $id_usuario)
  {
    $data = array(
      'cantidad' => $cantidad,
      'medida' => $medida,
      'ingreso' => 1,
      'id_usuario' => $id_usuario
    );
    $this->db->insert('deposito_new', $data); 
    
  }

  public function delete_ingresos_deposito($id_orden)
  {
    $this->db->delete('deposito_new', array('id_orden_produccion' => $id_orden));
  }


}
