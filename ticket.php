<html>

<style>
    .ticket {
        display: flex;
        flex-direction: column;
        border: solid 2px black;
        margin-top: 100px;
        padding: 20px;
        height: 300px;
        width: 300px;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
        align-items: center;
        box-shadow: 6px 9px 12px black;
        background-color: black;
        transition: width 2s, height 2s, background-color 2s, transform 2s;


    }

    .ticket:hover {
        box-shadow: inset 0px 0px 30px #000000;
        background-color: #e0cda9;
        width: 600px;
        height: 400px;
        transform: rotate(360deg);



    }

    .ticketBis {
        display: flex;
        flex-direction: column;
        border: solid 2px #e0cda9;
        margin-top: 100px;
        padding: 20px;
        height: 400px;
        width: 600px;
        margin-left: auto;
        margin-right: auto;
        justify-content: center;
        align-items: center;
        box-shadow: 6px 9px 12px black;
        background-color: #b5c47c;


    }

    .ticketBis:hover {
        box-shadow: inset 0px 0px 30px #000000;

    }

    .partie-un {

        display: flex;
        flex-direction: row;



        padding: 5px;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.1);



    }

    .one {
        margin: 5px;
        margin-right: 60px;

    }

    .two {
        margin: 5px;
        margin-left: 60px;

    }

    .partie-deux {

        display: flex;
        flex-direction: row;

        padding: 5px;


    }

    .film {
        font-weight: bold;
    }
</style>

<?php

//classe parent
class Ticket
{
    public $date;
    public $place;
    public $tarif;

    public function __construct($date, $place, $tarif)
    {
        $this->date = $date;
        $this->place = $place;
        $this->tarif = $tarif;
    }
}

// 1ere classe enfant
class TicketCinema extends Ticket
{
    protected $choixFilm;
    public $choixSeance;

    public function __construct($date, $place, $tarif, $choixFilm, $choixSeance)
    {
        parent::__construct($date, $place, $tarif);
        $this->choixFilm = $choixFilm;
        $this->choixSeance = $choixSeance;
    }

    //ajout d'une fonction magique
    public function __get($property)
    {
        if ($property === "choixFilm") {
            if ($this->$property === "DUNE") {
                return $this->$property . " (Age minimum = 12 ans)";
            } else if ($this->$property === "PIERRE LAPIN") {
                return $this->$property . " (Age minimum = 7 ans)";
            }
        } else {
            return $this->$property;
        }
    }
}
// 2e classe enfant
class TicketTheatre extends Ticket
{
    protected $choixPiece;
    protected $choixHeure;

    public function __construct($date, $place, $tarif, $choixPiece, $choixHeure)
    {
        parent::__construct($date, $place, $tarif);
        $this->choixPiece = $choixPiece;
        $this->choixHeure = $choixHeure;
    }


    //fonction magique
    public function __get($property)
    {
        if ($property === "choixHeure") {
            if ($this->$property === "14H00") {
                return $this->choixHeure . " (Entracte à 14H45)";
            } else if ($this->$property === "21H00") {
                return $this->choixHeure . " (Entracte à 21H45)";
            }
        } else {
            return $this->$property;
        }
    }
}
?>

<?php
/* 
***************************************
Récuperation des données envoyées via le formulaires
Création des nouveaux objets
Affichage des tickets sur la page
***************************************
*/

if ($_POST['choix'] === "cinema") {

    $cinoche = new TicketCinema($_POST['date'], $_POST['place'], $_POST['tarif'], $_POST['choixFilm'], $_POST['choixSeance']);


?>
    <div class="ticket">

        <h2>TICKET DE CINEMA</h2>
        <p class="film">FILM : <?php echo $cinoche->choixFilm; ?></p>
        <div class="partie-un">
            <div class="one">
                <p>Date : <?php echo $cinoche->date; ?></p>
            </div>
            <div class="two">
                <p>Ticket n° : <?php echo rand(); ?></p>
            </div>
        </div>
        <div class="partie-deux">
            <div class="one">
                <p>Place n° : <?php echo $cinoche->place; ?></p>
            </div>
            <div class="two">
                <p>Tarif : <?php echo $cinoche->tarif; ?></p>
            </div>
        </div>

        <p>Séance : <?php echo $cinoche->choixSeance; ?></p>
    </div>


<?php } else if ($_POST['choix'] === "theatre") {

    $piece = new TicketTheatre($_POST['date'], $_POST['place'], $_POST['tarif'], $_POST['choixPiece'], $_POST['choixHeure']);

?>
    <div class="ticketBis">
        <h2>TICKET DE THEATRE</h2>
        <p class="film">Pièce : <?php echo $piece->choixPiece; ?></p>
        <div class="partie-un">
            <div class="one">
                <p>Date : <?php echo $piece->date; ?></p>
            </div>
            <div class="two">
                <p>Ticket n° : <?php echo rand(); ?></p>
            </div>
        </div>
        <div class="partie-deux">
            <div class="one">
                <p>Place n° : <?php echo $piece->place; ?></p>
            </div>
            <div class="two">
                <p>Tarif : <?php echo $piece->tarif; ?></p>
            </div>
        </div>

        <p>Heure : <?php echo $piece->choixHeure; ?></p>
    </div>

<?php }








?>


</html>