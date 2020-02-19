<?php


defined('BASEPATH') OR exit('No direct script access allowed');
//PhpSpreadsheet
use phpOffice\phpspreadsheet\Spreadsheet;

class Phpspreadsheet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
        $this->load->model('Nilai_Model', 'nilai_model');
	}
	// index
	public function import()
	{
		$data = array();
		$data['title'] = 'Import Excel Sheet | TechArise';
		$data['breadcrumbs'] = array('Home' => '#');
		$this->load->view('spreadsheet/index', $data);
	}

	// file upload functionality
    public function upload() {
    	$data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        $data['breadcrumbs'] = array('Home' => '#');
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
            $this->load->view('spreadsheet/index', $data);
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
            	// get file extension
            	$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            	if($extension == 'csv'){
					$reader = new \phpoffice\phpspreadsheet\src\PhpSpreadsheet\Reader\Csv();
				} elseif($extension == 'xlsx') {
					$reader = new \phpoffice\phpspreadsheet\src\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \phpoffice\phpspreadsheet\src\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
				$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			
				// array Count
				$arrayCount = count($allDataInSheet);
	            $flag = 0;
	            $createArray = array('id_nilai', 'id_dosen', 'id_kelas', 'id_siswa', 'id_matkul' , 'nilai_siswa');
	            $makeArray = array('id_nilai' => 'id_nilai', 'id_dosen' => 'id_dosen', 'id_kelas' => 'id_kelas', 'id_siswa' => 'id_siswa', 'id_matkul' => 'id_matkul' , 'nilai_siswa' => 'nilai_siswa');
	            $SheetDataKey = array();
	            foreach ($allDataInSheet as $dataInSheet) {
	                foreach ($dataInSheet as $key => $value) {
	                    if (in_array(trim($value), $createArray)) {
	                        $value = preg_replace('/\s+/', '', $value);
	                        $SheetDataKey[trim($value)] = $key;
	                    } 
	                }
	            }
	            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
	            if (empty($dataDiff)) {
                	$flag = 1;
            	}
            	// match excel sheet column
	            if ($flag == 1) {
	                for ($i = 2; $i <= $arrayCount; $i++) {
	                    $addresses = array();
	                    $idNilai = $SheetDataKey['id_nilai'];
	                    $idDosen = $SheetDataKey['id_dosen'];
	                    $idKelas = $SheetDataKey['id_kelas'];
	                    $idSiswa = $SheetDataKey['id_siswa'];
						$idMatkul = $SheetDataKey['id_matkul'];
						$nilaiSiswa = $SheetDataKey['nilai_siswa'] ;

	                    $idNilai = filter_var(trim($allDataInSheet[$i][$idNilai]), FILTER_SANITIZE_STRING);
	                    $idDosen = filter_var(trim($allDataInSheet[$i][$idDosen]), FILTER_SANITIZE_STRING);
	                    $idKelas = filter_var(trim($allDataInSheet[$i][$idKelas]), FILTER_SANITIZE_EMAIL);
	                    $idSiswa = filter_var(trim($allDataInSheet[$i][$idSiswa]), FILTER_SANITIZE_STRING);
						$idMatkul = filter_var(trim($allDataInSheet[$i][$idMatkul]), FILTER_SANITIZE_STRING);
						$nilaiSiswa = filter_var(trim($allDataInSheet[$i][$nilaiSiswa]) , FILTER_SANITIZE_STRING) ;
	                    $fetchData[] = array('id_nilai' => $idNilai, 'id_dosen' => $idDosen, 'id_kelas' => $idKelas, 'id_siswa' => $idSiswa, 'id_matkul' => $idMatkul , 'nilai_siswa' => $NilaiSiswa);
	                }   
	                $data['dataInfo'] = $fetchData;
	                $this->site->setBatchImport($fetchData);
	                $this->site->importData();
	            } else {
	                echo "Please import correct file, did not match excel sheet column";
	            }
	            $this->load->view('spreadsheet/display', $data);
        	}              
    	}
	}

	// checkFileValidation
    public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
      	'text/comma-separated-values', 
      	'application/octet-stream', 
      	'application/vnd.ms-excel', 
      	'application/x-csv', 
      	'text/x-csv', 
      	'text/csv', 
      	'application/csv', 
      	'application/excel', 
      	'application/vnd.msexcel', 
      	'text/plain', 
      	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

}

?>
