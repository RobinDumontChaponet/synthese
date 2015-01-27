<!--meta title="Ma messagerie" -->

<div id="messagerie">

    <h1>Messages</h1>

    <section id="lus">
        <h3>Nouveaux</h3>

        <table>
            <tr> <th>Expéditeur</th> <th>Objet</th> <th>Date</th> </tr>
            <?php echo $nouveauxMessages; ?>
        </table>

    </section>

    <section id="nonLus">
        <h3>Lus</h3>

        <table>
            <tr> <th>Expéditeur</th> <th>Objet</th> <th>Date</th> </tr>
            <?php echo $anciensMessages; ?>
        </table>

    </section>

</div>
