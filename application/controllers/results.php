<?php

/**
* @author Sandra Rono
*/
class Results extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('results_model');
	}

	public function index()
	{
		$data['results'] = $this->results_model->list_results();
		$data['summarised_results'] = $this->results_model->get_summaryresults();

		$this->load->view('layout/header');
		$this->load->view('results', $data);
		$this->load->view('layout/footer');
	}

	//create results
	public function create()
	{
		if ($this->results_model->create_results()) {
			redirect('results', 'refresh');
		}
	}

	//create results form
	public function create_results()
	{
		$this->load->model('student_model');
		$data['students'] = $this->student_model->list_students();
		$data['subjects'] = $this->results_model->list_subjects();

		$this->load->view('layout/header');
		$this->load->view('post_results', $data);
		$this->load->view('layout/footer');

	}

	//edit results
	public function edit_results($id)
	{
		$data['results'] = $this->results_model->get_results($id);

		$this->load->view('layout/header');
		$this->load->view('edit_results', $data);
		$this->load->view('layout/footer');
	}

	//update results
	public function update()
	{
		if ($this->results_model->update_results()) {
			redirect('results' , 'refresh');
		}
	}

	//download result slip
	public function report_form($id)
	{
		$this->load->helper('app');
		//initialize column data
		$subject_name = $marks = $code = $remarks = "";
		$total = 0;
		//get data from the db
		$results = $this->results_model->get_myresults($id);
		foreach ($results as $key => $result) {
			$subject_name .= $result->sub_name."\n";
			$code .= $result->result_id."\n";
			$marks .= $result->marks."\n";
			$remarks .= get_tutorname($result->posted_by)."\n";
			$total += $result->marks;
		}

		$total_rows = count($results);

		//initialize the pdf creating library
		$pdf = $this->load->library('fpdf');
		
		$this->fpdf->AddPage();

		$this->fpdf->SetFont('Arial','',12);
		$this->fpdf->SetX(35);
	    $this->fpdf->Cell(100,10,'Student: '.get_studentname($id),0,1,'L');
	    
	    // Line break
	    $this->fpdf->Ln();
		//Fields Name position
		$Y_Fields_Name_position = 60;
		//Table position, under Fields Name
		$Y_Table_Position = 66;

		//First create each Field Name
		//Gray color filling each Field Name box
		$this->fpdf->SetFillColor(232,232,232);
		//Bold Font for Field Name
		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->SetY($Y_Fields_Name_position);
		$this->fpdf->SetX(35);
		$this->fpdf->Cell(20,6,'CODE',1,0,'L',1);
		$this->fpdf->SetX(55);
		$this->fpdf->Cell(100,6,'SUBJECT',1,0,'L',1);
		$this->fpdf->SetX(125);
		$this->fpdf->Cell(30,6,'MARKS',1,0,'R',1);
		$this->fpdf->Ln();

		//Now show the actual columns
		$this->fpdf->SetFont('Arial','',12);
		$this->fpdf->SetY($Y_Table_Position);
		$this->fpdf->SetX(35);
		$this->fpdf->MultiCell(20,6,$code,1);
		$this->fpdf->SetY($Y_Table_Position);
		$this->fpdf->SetX(55);
		$this->fpdf->MultiCell(100,6,$subject_name,1);
		$this->fpdf->SetY($Y_Table_Position);
		$this->fpdf->SetX(125);
		$this->fpdf->MultiCell(30,6,$marks,1,'R');
		$this->fpdf->SetX(125);
		$this->fpdf->MultiCell(30,6,'Average: '.$total/$total_rows,1,'R');

		//Create lines (boxes) for each ROW (Product)
		//If you don't use the following code, you don't create the lines separating each row
		$i = 0;
		$this->fpdf->SetY($Y_Table_Position);
		while ($i < $total_rows)
		{
			$this->fpdf->SetX(35);
			$this->fpdf->MultiCell(120,6,'',1);
			$i = $i +1;
		}

		$this->fpdf->Output();
	}
}

?>