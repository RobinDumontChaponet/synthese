<!--meta title="Message"  -->

<div>


    <h1>Envoyer un message</h1>

    <form method="POST" action="message-ecrire">
        <label for="destinataire">Destinataire</label>
        <input type="text" id="destinataire" name="destinataire" <?php if(isset($destinataire)){echo 'value="'.$destinataire.'"';} ?> />

        <br />

        <label for="objet">Objet</label>
        <input type="text" id="objet" name="objet" <?php if(isset($objet)){echo 'value="'.$objet.'"';} ?> />

        <br />

        <label for="message">Message</label>
        <br />
        <textarea id="message" name="message" cols="50" rows="10"><?php if(isset($message)){echo $message;} ?></textarea>

        <input type="submit" value="Envoyer" />
    </form>


</div>
