<!--meta title="Importer promo .csv" css="style/csv.css" js="script/tabulars.transit.js" js="script/uploadCSV.js"-->
<div id="content">
<?php if(!empty($output)) { ?>
  <p class="notice">Le fichier .csv contient les erreurs suivantes. Corrigez-les puis validez.</p>
  <form action="" method="post" name="correct">
  	<?php echo $output; ?>
  	<br /><input type="submit" value="Corriger" />
  </form>
<?php
} else {
?>
aperçu...
<?php
}
?>
</div>
<script type="text/javascript">
document.forms[0].style.display='block';
setAnimationState(document.forms[0], 'running');
</script>