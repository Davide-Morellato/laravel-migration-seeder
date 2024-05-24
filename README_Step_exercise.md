1. Ho installato il pack laravel, bootstrap

2. Ho creato il database su PHPMyAdmin e collegato nel file .env associando il nome del DB al campo DB_DATABASE (impostando anche gli altri campi)

3. Ho lanciato da terminale il comando per creare la tabella nel database:
     php artisan make:migration create_nome_tabella_table

4. Nella cartella DATABASE->MIGRATIONS mi sono recuperato il file migration appena creato e, aprendolo, nella function up(), ho creato le colonne, invocando il metodo di riferimento e inserendo poi il nome della colonna e il valore, qualora necessario:
$nome_tabella->string('nome_colonna', lunghezza_stringa_numero)

5. Dopo aver creato le varie colonne, lancio il comando per inserirle nella tabella:
    php artisan migrate

6. Dopo aver inserito le colonne, su PHPMyAdmin ho inserito i rispettivi valori, così poi da creare il file Model e Controller, lanciando rispettivamente i comandi:
php artisan make:models NomeModel
php artisan make:controller NomeController

7. Nel file Controller ho collegato il Model (@use App/Models/NomeModel) ed impostato la function index() che rimanda alla home i dati presi dal Model, inserendo nella view il nome del file in cui deve rimandare e il compact('nome_variabile_associata_al_model')

8. In web.php ho collegato la funzione nel Controller, assegnandogli come secondo parametro un array [NomeController::class, 'nome_metodo'].

9. Nella pagina di destinazione, dove stampare i valori, ho creato un @foreach//@endforeach così da poter leggere le proprietà ed i rispettivi valori.