<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8" />
        <title></title>
        <script type="text/javascript" src="ajaxRecherche.js"></script>
    </head>
    
    
    <body onload="link_ajax()">
    
        <section id="criteres">
            <label for="nom" >Nom : </label>
            <input type="text" id="nom" name="nom" onkeyup="link_ajax()" /><br />
            
            <label for="prenom">Prenom : </label>
            <input type="text" id="prenom" name="prenom" onkeyup="link_ajax()" /><br />
           
            <label for="promotion">Promotion : </label>
            <select id="promotion" name="promotion" onchange="link_ajax()"><?php echo $listePromotions; ?></select><br />
            
            <label for="diplome">Diplôme DUT : </label>
            <select id="diplome" name="diplome" onchange="link_ajax()"><?php echo $listeDiplomesDUT ?></select><br />
            
            <label for="typeSpecialisation">Type de spécialisation : </label>
            <select id="typeSpecialisation" name="typeSpecialisation" onchange="link_ajax()" ><?php echo $listeTypesSpecialisation ?></select><br />
            
            <label for="specialisation">Spécialisation : </label>
            <input type="text" name="specialisation" id="specialisation" onkeyup="link_ajax()" /><br />
           
            <label for="diplomePostDUT">Diplôme post-DUT : </label>
            <input type="text" id="diplomePostDUT" name="diplomePostDUT" onkeyup="link_ajax()" /><br />
           
            <label for="etabPostDUT">Etablissement post-DUT : </label>
            <input type="text" id="etabPostDUT" name="etabPostDUT" onkeyup="link_ajax()" /><br />
            
            <label for="travailActuel">Travail actuel : </label>
            <input type="text" id="travailActuel" name="travailActuel" onkeyup="link_ajax()" />
        </section>
        
        
        
        
        
        
        
        <section id="resultat">
            
        </section>
    
    </body>

</html>
