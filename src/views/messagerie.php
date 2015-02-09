<!--meta title="Messages" -->
<div id="content">
	<a class="edit" href="message-ecrire">Écrire un nouveau message</a>
    <h1>Messages</h1>
    <section id="lus">
        <h2>Non-lus</h2>
        <table>
            <tr> <th>Expéditeur</th> <th>Objet</th> <th>Date</th> </tr>
            <?php echo $nouveauxMessages; ?>
        </table>
    </section>
    <section id="nonLus">
        <h2>Lus</h2>
        <table>
            <tr> <th>Expéditeur</th> <th>Objet</th> <th>Date</th> </tr>
            <?php echo $anciensMessages; ?>
        </table>
    </section>
</div>