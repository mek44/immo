<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('form');
	}


	public function addclient()
	{
// 		type_client
// nom
// prenom
// profession
// telephone
// departement
// commune
// arondissement
// quartier
// document
// aucun_document
// certifie_exact
		$this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('prenom', 'prenom', 'required');
        $this->form_validation->set_rules('profession', 'profession', 'required');
        $this->form_validation->set_rules('telephone', 'telephone', 'required');
        $this->form_validation->set_rules('departement', 'departement', 'required');
        $this->form_validation->set_rules('commune', 'commune', 'required');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('certifie_exact', 'Certifiez exact', 'required');

        $type_client = $this->input->post('type_client');
       $nom = $this->input->post('nom');
       $prenom = $this->input->post('prenom');
       $profession = $this->input->post('profession');
       $telephone = $this->input->post('telephone');
       $departement = $this->input->post('departement');
       $commune = $this->input->post('commune');
       $arrondissement = $this->input->post('arondissement');
       $quartier = $this->input->post('quartier');
       $documents = $this->input->post('document');
       $aucun_document = $this->input->post('aucun_document');
       $certifie_exact = $this->input->post('certifie_exact');

       $donnee_falsh = 
       ([
       		'nom' => $nom,
       		'prenom' => $prenom,
       		'profession' => $profession,
       		'telephone' => $telephone
       ]);
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('danger', validation_errors());
            $this->session->set_flashdata('donnee', $donnee_falsh);

			redirect(base_url(), 'location');

        }elseif ($type_client == "vendeur" && $documents == NULL && $aucun_document == "") {

        	$this->session->set_flashdata('danger', "Veuillez mentionner les documents que vous possedez !");
        	$this->session->set_flashdata('donnee', $donnee_falsh);
			redirect(base_url(), 'location');

        }else
        {
               

               $data_table_client = 
               ([
               		'nom' => $nom,
               		'prenom' => $prenom,
               		'profession' => $profession,
               		'telephone' => $telephone,
               		'type_client' => $type_client
               ]);
               $resultclient = $this->vtm->Ajouter("client",$data_table_client);

               if($resultclient['success'])
               {
               		$id_client = $resultclient['insert_id'];

           		 	$data_inof_parcelle = 
	               ([
	               		'id_client' => $id_client,
	               		'departement' => $departement,
	               		'commune' => $commune,
	               		'arrondissement' => $arrondissement,
	               		'quartier' => $quartier
	               ]);

	               $resultparcelle = $this->vtm->Ajouter("parcelle", $data_inof_parcelle);

	               if($resultparcelle['success'])
	               {
	               		if($type_client == "vendeur" && $documents != NULL)
	               		{
	               			$insert_id_parcelle = $resultparcelle['insert_id'];
               				for ($i=0; $i < sizeof($documents); $i++) 
               				{ 
			               		$data_parcelle_document = 
			               		([
			               			'id_parcelle' => $insert_id_parcelle,
			               			'id_document' => $documents[$i]
			               		]);

			               		$resultparcelle = $this->vtm->Ajouter("parcelle_document", $data_parcelle_document);
			               	}

			               $this->session->set_flashdata('success', 'Données envoyer aves succès');

			               	redirect(base_url());
	               		}else
	               		{
	               			$this->session->set_flashdata('success', 'Données envoyer aves succès');
	               			redirect(base_url());
	               		}
	               }
               }
            }
	}
}
