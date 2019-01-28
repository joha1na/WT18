<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Datei einlesen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Anmeldung</h1>
      <p><a href="../index.html">Startseite</a></p>
      <?php
      if($_POST) {

        $vorname = filter_var($_POST['vorname'], FILTER_SANITIZE_STRING); //nicht 'filter:'
        $nachname = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING); //nur FILTER_SANITIZE_STRING
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $studiengang = filter_var($_POST['studiengang'], FILTER_SANITIZE_STRING);

        $fehler = false;
        if(!$vorname || !$nachname || !$email || !$studiengang) $fehler=true;

        if(!$fehler)
        {
          echo "
            <p>
            Herzlichen Dank ".$vorname." ".$nachname." vom Studiengang ".$studiengang."!<br />
            <a href='./aufgabe7.php'>Zurück</a>
            </p>
            ";
        }
      }
      if(($_POST && $fehler) || empty($_POST)) :
      ?>

      <form class="form-horizontal" action="./aufgabe7.php" method="post">
        <div class="form-group row">
          <label for="vorname" class="col-3">Vorname : </label>
          <input type="text" name="vorname" placeholder="Vorname" class="form-control col-9">
        </div>

        <div class="form-group row">
          <label for="nachname" class="col-3">Nachname : </label>
          <?php
          if(isset($nachname) && !$nachname){
            echo "
            <input type='text' name='nachname' placeholder='Nachname' class='form-control col-9 is-invalid'>
            <div class='invalid-feedback'>
              Bitte Nachnamen eintragen!
            </div>
            ";
          }
          else {
            echo "
            <input tpye='text' name='nachname' placeholder='Nachname' class='form-control col-9'>
            ";
          }
          ?>

        </div>

        <div class="form-group row">
          <label for="email" class="col-3">E-Mail : </label>
          <input type="email" name="email" placeholder="E-Mail" autocomplete="off" class="form-control col-9">
        </div>

        <div class="form-group row">
          <label for="studiengang" class="col-3">Studiengang : </label>
          <select name="studiengang" class="form-control col-9">
            <option value=>Bitte auswählen!</option>
            <option value="FIW">Informatik und Wirtschaft</option>
            <option value="AI">Angewandte Informatik</option>
            <option value="IMI">Internationale Medieninformatik</option>
          </select>
        </div>

        <div class="form-group row">
          <label for="pwd" class="col-3">Passwort : </label>
          <input type="password" name="pwd" placeholder="Passwort" autocomplete="new-password" class="form-control col-9">
        </div>

        <button type="submit" name="button">Anmelden</button>
      </form>
      <?php
      endif;
      ?>
    </div>
  </body>
</html>
