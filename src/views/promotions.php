<!--meta title="IUTbook | Promotions" css="style/animations.css"-->
<section id="content">
  <article>
	<h1>Promotions</h1>
  	<ul>
<?php foreach ($promos as $promo) {?>
	  <li><a href="promotion/<?php echo $promo->getId();?>" title="Promotion année : <?php echo $promo->getAnnee();?>">Promotion année : <?php echo $promo->getAnnee();?></a></li>
<?php }?>
	</ul>
  </article>
</section>