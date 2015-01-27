<div>

    <section id="infos">

        <label for="exp">Expéditeur</label><span id="exp" name="exp"> <?php echo $expediteur; ?> </span>
        <br />
        <label for="obj">Objet</label><span id="obj" name="obj"> <?php echo $objet; ?> </span>
        <br />
        <label for="date">Date</label><span id="date" name="date"> <?php echo $date; ?> </span>

    </section>

    <section id="message">
        <label for="corps">Message</label><span id="corps" name="corps"> <?php echo $corps; ?> </span>
    </section>

    <section id="actions">
        <form action="message-ecrire" method="POST">
            <input type="submit" value="Répondre" />
            <input type="hidden" name="dest_rep" id="dest_rep" value=<?php echo $message->getExpediteur()->getId(); ?> />
        </form>
    </section>

</div>
