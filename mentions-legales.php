<?php
require_once('partials/header.php');
?>

<style>
	.pb {
		padding-bottom: 200px;
	}
	.container {
		width: 1170px;
		margin: 0 auto 0 auto;
	}
</style>

 <!-- Start main-content -->
  <div class="container" id="content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg11.jpg">
      <div class="container pt-120 pb-50">
        <!-- Section Content -->
        <div class="section-content pt-100">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="title text-white">Mentions légales</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="container pb">
	<div class="grid grid--container">
		<div class="row">
			<div class="text-left">
				<p></p>
				<h4>www.</h4>
				<p></p>
				<h4>Édité par&nbsp;: <?= helper::get('name') ?></h4><br>
				Siège Social&nbsp;: <?= helper::getFullAddress() ?><br>
				Tél&nbsp;: <?= helper::get('phone') ?><br>
				Siret : 
				<p></p>
				<p>
					Site réalisé et hébergé par <strong>IACOM SARL</strong> au capital de 25000€ <br> 
					Siège social : 40 rue de la Gare 94110 ARCUEIL  <br> 
					Tél. : 09 70 44 55 45  <br> 
					RCS Créteil n°833 291 248 
				</p>
				<h2>Propriété intellectuelle :</h2><br>
				L’ensemble de ce site relève des législations Françaises et Internationales sur les droits d’auteur et la propriété intellectuelle. Tous les droits de reproduction sont réservés pour les textes et les photographies de ce site. La reproduction de tout ou partie de ce site sur un support électronique ou autre quel qu’il soit, est formellement interdite sauf autorisation écrite de l’auteur, conformément à l’article L 122-4 du Code de la Propriété intellectuelle.
				<p></p>
				<p></p>
				<h2>Crédit photos :</h2><br>
				Fotolia – Tous droits réservés.
				<p></p>
				<p></p>
				<h2>Liens hypertextes :</h2><br>
				Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet, et notamment vers ses partenaires ont fait l’objet d’une autorisation préalable, expresse et écrite auprès de l’éditeur.
				<p></p>
				<p></p>
				<h2>Droit de réponse :</h2><br>
				Toute personne citée sur le site peut faire valoir un droit de réponse. Une simple demande sera adressée par courrier.
				<p></p>
				<p></p>
				<h2>Politique de confidentialité :</h2><br>
				En aucun cas, les données recueillies sur le site www. ne seront cédées ou vendues à des tiers. Aucune adresse email ne sera transmise à des tiers y compris à nos partenaires sauf avec l’accord écrit des intéressés.
				<p></p>
			</div>				
		</div>
	</div>
</section>

</div>
 
<?php require_once('partials/footer.php') ?>