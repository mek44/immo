<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vente/Achat Immobilier Parcelle</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/iconic/css/material-design-iconic-font.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css">	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/noui/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
</head>
<body>

	<div class="container" style="margin-top: 15px;">
		<div class="row">
			<div class="col-lg-4 col-md-4" style="margin-top: 15px;">
				<p style="border: 2px solid black"></p>
			</div>
			<div class="col-lg-4 col-md-4">
				<p style="text-align: center;">
					Voulez vous acheter ou vendre une parcelle/immeuble/domaine dans le departement d'Atlantique et/ou Littoral ? 
				</p>
			</div>

			<div class="col-lg-4 col-md-4" style="margin-top: 15px;">
				<p style="border: 2px solid black"></p>
			</div>
		</div>
	</div>
	


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" id="form_" method="post" action="<?php echo base_url().'acceuil/addclient' ?>">
				<span class="contact100-form-title">
					Veuillez bien remplir le formulaire ci-après
				</span>

				<div class="w-full js-show-service">
					<?php if ($this->session->flashdata('danger')): ?>
	                     <div class="alert alert-danger" role="alert">
	                        <strong>Attention!</strong> <?php echo $this->session->flashdata('danger'); ?>
	                    </div>
	                <?php endif ?>

	                <?php if ($this->session->flashdata('success')): ?>
	                     <div class="alert alert-success" role="alert">
	                        <strong>Succes!</strong> <?php echo $this->session->flashdata('success'); ?>
	                    </div>
	                <?php endif ?>
            	</div>


				<p>
					Vous êtes un acheteur ou un vendeur?
				</p><br>
				<hr width="300" align="left">

				<div class="w-full js-show-service rs1-wrap-input100">
					<div class="wrap-contact100-form-radio">
						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="vendeur" type="radio" name="type_client" value="vendeur" checked="true">
							<label class="label-radio100" for="vendeur">
								Je veux vendre
							</label>
						</div>
					</div>
				</div>

				<div class="w-full js-show-service rs1-wrap-input100">
					<div class="wrap-contact100-form-radio">
						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="acheteur" type="radio" name="type_client" value="acheteur">
							<label class="label-radio100" for="acheteur" >
								Je veux acheter
							</label>
						</div>
					</div>
				</div>

				
				<p>
					Information Personnelle
				</p><br>
				<hr width="300" align="left">

				<div class="wrap-input100 validate-input  rs1-wrap-input100" data-validate = "Entrez votre nom">
					<span class="label-input100">Nom : *</span>
					<input class="input100" type="text" name="nom" placeholder="Votre nom" value="<?php echo $this->session->flashdata('donnee')['nom']; ?>">
				</div>

				<div class="wrap-input100 validate-input  rs1-wrap-input100" data-validate = "Entrez votre prénom">
					<span class="label-input100">Prénom : *</span>
					<input class="input100" type="text" name="prenom" placeholder="Votre prénom" value="<?php echo $this->session->flashdata('donnee')['prenom']; ?>">
				</div>


				<div class="wrap-input100 validate-input  rs1-wrap-input100" data-validate = "Entrez votre profession">
					<span class="label-input100">Profession : *</span>
					<input class="input100" type="text" name="profession" placeholder="Votre profession" value="<?php echo $this->session->flashdata('donnee')['profession']; ?>">
				</div>

				<div class="wrap-input100 validate-input  rs1-wrap-input100">
					<span class="label-input100">Téléphone : *</span>
					<input class="input100" type="number" name="telephone" placeholder="Votre téléphone" value="<?php echo $this->session->flashdata('donnee')['telephone']; ?>">
				</div>
				

				<p>
					A propos de la Parcelle
				</p><br>
				<hr width="300" align="left">

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Département : *</span>
					<div>
						<select class="js-select2" name="departement" id="departement">
							<option>Choississez le departement</option>
							<option value="Atlantique">Atlantique</option>
							<option value="Littoral">Littoral</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Communes : *</span>
					<div>
						<select class="js-select2" name="commune" id="commune" disabled="true">
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="wrap-input100  rs1-wrap-input100">
					<span class="label-input100">Arrondissement : </span>
					<input class="input100" type="text" name="arondissement" placeholder="Votre arrondissement ">
				</div>

				<div class="wrap-input100  rs1-wrap-input100">
					<span class="label-input100">Quartier : </span>
					<input class="input100" type="text" name="quartier" placeholder="Votre quartier">
				</div>
				
				<p class="infoSupVendeur">
					<!-- Document Parcelle pour le vendeur -->
					<p>
						Quels sont les documents que vous possédez ? <span id="ignr" style="color: red"></span>
					</p><br>
					<hr width="300" align="left">
				
					<div class="w-full js-show-service">
						<div class="wrap-contact100-form-radio">
							<div class="contact100-form-radio m-t-15">
								<input class="input-radio100" id="convention_vente" type="checkbox" name="document[]" value="1">
								<label class="label-checkbox" for="convention_vente">
									Convention de vente / Ordonnance portant désignation de liquidation de succession
								</label>
							</div>

							<div class="contact100-form-radio">
								<input class="input-radio100" id="recu_lotissement" type="checkbox" name="document[]" value="2">
								<label class="label-checkbox" for="recu_lotissement">
									Reçu de lotissement
								</label>
							</div>

							<div class="contact100-form-radio">
								<input class="input-radio100" id="leve_topographique" type="checkbox" name="document[]" value="3">
								<label class="label-checkbox" for="leve_topographique">
                                    Levé topographique
								</label>
							</div>

                            <div class="contact100-form-radio">
								<input class="input-radio100" id="cin" type="checkbox" name="document[]" value="4">
								<label class="label-checkbox" for="cin">
                                    Carte Nationale d’Identité / Passeport
								</label>
							</div>
						</div>
					</div>


					<div class="w-full">
						<div class="contact100-form-radio">
							<input class="input-radio100" id="aucun_document" type="checkbox" name="aucun_document" value="aucun_document">
							<label class="label-checkbox" for="aucun_document">
								Je n'ai aucun de ces documents
							</label>
						</div>
					</div>

					<blockquote>
						NB : "Pas d'inquiétude si vous ne disposez d'aucun document,<br>Vous pouvez entrer en leur poccession dans un bref délai."
					</blockquote>	
				</p>


				<div class="contact100-form-radio">
					<input class="input-radio100" id="certifie_exact" type="checkbox" name="certifie_exact" value="oui" required="required">
					<label class="label-checkbox" for="certifie_exact">
						Je certifie exactes les informations mentionnées ci-dessus
					</label>
				</div>
				<hr width="100" align="left">
				



				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Soummettre
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

	<script src="<?php echo base_url();?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
	<script src="<?php echo base_url();?>assets/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
