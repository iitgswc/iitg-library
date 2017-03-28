<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

class Gsheet extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public $title = "Lakshminath Bezbaroa Central Library";
	private $google_api_credentials;
	private $access_key_file;
	private $accessToken;
	private $pdf_location = "assets/sheets/";

	public function __construct(){
		parent::__construct();

		$this->google_api_credentials = FCPATH.'.api-keys/client_secret_767286571202-ogsenpbt99tojggribdvqf0g7afh0omn.apps.googleusercontent.com.json';
		$this->access_key_file = FCPATH.'.api-keys/google_drive_api_access_key.json';
	}

	public function index(){
		
	}


	public function getClient(){

		$client = new Google_Client();
		$client->setAuthConfig($this->google_api_credentials);
		$client->addScope(Google_Service_Drive::DRIVE);
		$client->setAccessType('offline');
		// $client->addScope("https://www.googleapis.com/auth/spreadsheets");
		// $client->addScope("https://spreadsheets.google.com/feeds");
		$redirect_uri = site_url('gsheet/getClient');
		$client->setRedirectUri($redirect_uri);

		if (isset($_GET['code'])) {
			$accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
			if(!file_exists(dirname($this->access_key_file))) {
				mkdir(dirname($this->access_key_file), 0700, true);
			}
			file_put_contents($this->access_key_file, json_encode($accessToken));
			redirect(base_url('gsheet/fetchSheet'));
		}

		// check if credentials present
		if (file_exists($this->access_key_file)) {
			$accessToken = json_decode(file_get_contents($this->access_key_file), true);
		}else{
			$authUrl = $client->createAuthUrl();
			redirect($authUrl);
		}

		try{
			$client->setAccessToken($accessToken);
		} catch(Exception $e){
			// delete token file and start over
			echo("delete token file and start over");
			unlink($this->access_key_file);
			redirect(base_url('gsheet/fetchSheet'));
		}

		// Refresh the token if it's expired.
		if ($client->isAccessTokenExpired()) {
			$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
			file_put_contents($this->access_key_file, json_encode($client->getAccessToken()));
		}

		return $client;
	}


	public function fetchSheet(){
		$client = $this->getClient();
		$service = new Google_Service_Drive($client);

		$optParams = array(
			'q' => 'name=\'TESTING - Library Book Budget for FY 2016-17.xlsx\'',
			'pageSize' => 10,
			'fields' => 'nextPageToken, files(id, name)'
		);

		$results = $service->files->listFiles($optParams);

		if (count($results->getFiles()) == 0) {
			print "No files found.\n";
		} else {
			print "Files:\n";
			foreach ($results->getFiles() as $file) {
				printf("%s (%s)\n", $file->getName(), $file->getId());
			}
		}

		$fileId = $results->getFiles()[0]->getId();
		$spreadsheetId = $fileId;

		// add last updated
		$service_sheets = new Google_Service_Sheets($client);
		$range = "A30";
		// $values = array(
		// 	'=concat(concat("Last Updated From Script : ",text(now(),"dd/mm/yyyy HH:m:ss"))," (24 hour format)")'
		// );
		$values = array(
			array(
					'=concat(concat("Last Updated : ",text(now(),"dd/mm/yyyy HH:m:ss"))," (24 hour format)")'
			)
		);
		$body = new Google_Service_Sheets_ValueRange(array('values' => $values));
		$params = array('valueInputOption' => 'USER_ENTERED'); //https://developers.google.com/sheets/api/reference/rest/v4/ValueInputOption
		$result = $service_sheets->spreadsheets_values->update($spreadsheetId, $range, $body, $params);


		// download pdf
		$response = $service->files->export($fileId, 'application/pdf', array('alt' => 'media'));
		$content = $response->getBody()->getContents();
		$fp = fopen($this->pdf_location.'sheet.pdf', 'w');
		fwrite($fp, $content);
		fclose($fp);

		$this->split_pdf('sheet.pdf',$this->pdf_location,1);
		unlink($this->pdf_location.'sheet.pdf');
		rename($this->pdf_location.'sheet_1.pdf', $this->pdf_location.'bvstatus.pdf');
	}


	public function split_pdf($filename, $end_directory = false, $pages = 1){

		$end_directory = $end_directory ? $end_directory : './';
		
		$pdf = new FPDI();
		$pagecount = $pdf->setSourceFile($this->pdf_location.$filename); // How many pages?
		
		// Split each page into a new PDF
		for ($i = 1; $i <= $pagecount; $i++) {
			$new_pdf = new FPDI();
			$new_pdf->AddPage();
			$new_pdf->setSourceFile($this->pdf_location.$filename);
			$new_pdf->useTemplate($new_pdf->importPage($i));
			
			try {
				$new_filename = $end_directory.str_replace('.pdf', '', $filename).'_'.$i.".pdf";
				$new_pdf->Output($new_filename, "F");
				echo "Page ".$i." split into ".$new_filename."<br />\n";
			} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}

			if($i == $pages) break;
		}
	}
}