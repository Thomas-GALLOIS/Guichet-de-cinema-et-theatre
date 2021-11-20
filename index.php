<html>

<style>
    body {
        background-color: lightgray;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
    }

    .form {
        background-color: white;
        display: flex;
        flex-direction: column;
        height: 500px;
        width: 400px;
        margin-left: auto;
        margin-right: auto;

        padding: 20px;
        align-items: center;
        margin-top: 100px;

        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07),
            0 2px 4px rgba(0, 0, 0, 0.07),
            0 4px 8px rgba(0, 0, 0, 0.07),
            0 8px 16px rgba(0, 0, 0, 0.07),
            0 16px 32px rgba(0, 0, 0, 0.07),
            0 32px 64px rgba(0, 0, 0, 0.07);

    }

    .block-choix {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .block-cine {
        flex: 1;
        margin: 5px;
        border: 1px solid grey;
        border-radius: 5px;
        padding: 10px;
        background-color: #DCDCDC;
    }

    .block-theatre {
        flex: 1;
        margin: 5px;
        border: 1px solid grey;
        border-radius: 5px;
        padding: 10px;
        background-color: #DCDCDC;
    }

    p {
        padding-left: 30px;

    }
</style>

<body>

    <?php
    require_once "ticket.php";
    ?>

    <h1>VENTE DE BILLETS</h1>
    <form class="form" action="ticket.php" method="POST">


        <label>Type de place :</label>
        <select name="choix">
            <option value="">--type de place--</option>
            <option value="cinema">Cinéma</option>
            <option value="theatre">Théatre</option>
        </select>
        </br>
        </br>

        <label>Date :</label>
        <input type="date" name="date">
        </br>
        </br>

        <label>Place :</label>
        <input type="text" name="place" placeholder="entre 0 et 100">
        </br>


        <label>Tarif :</label>
        <input type="text" name="tarif" placeholder="Adulte ou Enfant">
        </br>
        <div class="block-choix">
            <div class="block-cine">
                <p>Cinéma :</p>
                </br>
                <select name="choixFilm">
                    <option value="">--choix du film--</option>
                    <option value="DUNE">DUNE</option>
                    <option value="PIERRE LAPIN">PIERRE LAPIN</otpion>
                </select>
                </br>
                </br>


                <select name="choixSeance">
                    <option value="">--Séance--</option>
                    <option value="19H00">19H</option>
                    <option value="21H00">21H</otpion>
                </select>
            </div>
            <div class="block-theatre">
                <p>Théatre :</p>
                </br>
                <select name="choixPiece">
                    <option value="">--choix de la pièce--</option>
                    <option value="HAMLET">HAMLET</option>
                    <option value="ROMEO ET JULIETTE">ROMEO ET JULIETTE</otpion>
                </select>
                </br>
                </br>
                <select name="choixHeure">
                    <option value="">--Heure--</option>
                    <option value="14H00">14H00</option>
                    <option value="21H00">21H00</otpion>
                </select>
            </div>
        </div>
        </br>

        <input type="submit">
    </form>
</body>

<?php /*

if ($_POST['choix'] === "cinema") {

    $cinoche = new TicketCinema($_POST['date'], $_POST['place'], $_POST['tarif'], $_POST['choixFilm'], $_POST['choixSeance']);


?>

    <h2>Votre ticket de cinéma :</h2>

    <p>Date : <?php echo $cinoche->date; ?></p>
    <p><?php echo rand(); ?></p>
    <p>Place n° : <?php echo $cinoche->place; ?></p>
    <p>Tarif : <?php echo $cinoche->tarif; ?></p>
    <p>FILM : <?php echo $cinoche->choixFilm; ?></p>
    <p>Séance : <?php echo $cinoche->choixSeance; ?></p>





<?php } else if ($_POST['choix'] === "theatre") {

    $piece = new TicketTheatre($_POST['date'], $_POST['place'], $_POST['tarif'], $_POST['choixPiece'], $_POST['choixHeure']);

?>

    <h2>Votre ticket de théatre:</h2>

    <p>Date : <?php echo $piece->date; ?></p>
    <p><?php echo rand(); ?></p>
    <p>Place n° : <?php echo $piece->place; ?></p>
    <p>Tarif : <?php echo $piece->tarif; ?></p>
    <p>Pièce : <?php echo $piece->choixPiece; ?></p>
    <p>Heure : <?php echo $piece->choixHeure; ?></p>


<?php }








*/ ?>









</html>