<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produccion extends CI_Controller {
	
	public function __construct() {
	    parent::__construct();   
	    if(!$this->session->userdata('logueado')) redirect('login/iniciar_sesion');   
	    $this->data = array();       
	    $this->data['data'] = $this->session->userdata('user_data');
	    $this->load->model('model_produccion');
  	}

	public function index($mensaje = 0)	{
		$this->data['mensaje'] = $mensaje;

		$dia = $this->input->post('inputDia');
		$mes = $this->input->post('selectMes');
        $anio = $this->input->post('inputAnio');
        if($dia == '') $dia = date('j'); 
        if($mes == '') $mes = date('n'); 
       	if($anio == '')	$anio = date('Y');
       	$this->data['tabla'] = $this->model_produccion->getTabla($dia, $mes, $anio);
       	$this->data['dia'] = $dia;
       	$this->data['mes'] = $this->meses($mes);
       	$this->data['anio'] = $anio;

		$this->load->view('view_header');
		$this->load->view('view_produccion', $this->data);
	}

	public function ingreso() {		
		$fecha = $this->input->post('inputFechaProduccion');
		$banco = $this->input->post('selectBanco');
        $medida = $this->input->post('selectMedida');
        $cantidad = $this->input->post('inputCantidad');
        $fecha = date('Y-m-d',strtotime($fecha));
        $this->model_produccion->ingreso_produccion($fecha, $banco, $medida, $cantidad, $this->data['data']['id_usuario']);
        redirect('produccion/index/1');
	}

	public function meses($mes) {
		switch ($mes) {
			case 1: return 'Enereo';
			case 2: return 'Febrero';
			case 3: return 'Marzo';
			case 4: return 'Abril';
			case 5: return 'Mayo';
			case 6: return 'Junio';
			case 7: return 'Julio';
			case 8: return 'Agosto';
			case 9: return 'Septiembre';
			case 10: return 'Octubre';
			case 11: return 'Noviembre';
			case 12: return 'Diciemrbe';
		}
	}
}
?>