# Wilding BnB 

Wilding B&B è la realizzazione di un sito internet per la gestione di un b&b che offre funzionalità a livello di Clienti e di Albergatori. Il progetto è stato realizzato utilizzando il framework laravel e il dbms MysQL mentre Bootstrap Material Design come template grafico e Stepper Form, Materialize, Jquery UI date/timepicker per la gestione degli elementi grafici.Nel sito sono presenti due sezioni, una riguardante l' albergatore in cui si potranno inserire le inserzioni di una o più stanze consentendo l'affitto sia a giorni che ad ore e l'altra riguardante il cliente, dove si potranno eseguire azioni come cercare una stanza in una città e avere un riepilogo delle prenotazioni effettuate. 
Se durante la scelta della tipologia di affitto si è scelto "affitto ad ore", 30 minuti prima della scadenza del suddetto affitto verrà automaticamente inviata una e-mail dove sarà possibile richiedere a piacimento, un prolungamento della prenotazione. Infine una sezione dedicata all'amministratore del sito contenente minimali funzionalità come la modifica dei dati o cancellazione di un generico utente o dell' inserzione.


## Getting Started

1. Scaricare e installare [MysQl](https://www.mysql.com)
2. Scaricare e installare [PHP](https://www.php.net/downloads.php) (si consiglia di scaricare [Wamp](http://www.wampserver.com/en/) un ambiente di sviluppo con MysQl e php pronti all'uso.)
3. Scaricare e installare [Composer](https://getcomposer.org/download/) seguendo le istruzione presenti sul sito.
4. Scaricare e installare [Laravel](https://laravel.com/docs/6.x#installing-laravel)

## Running the tests

Se si esegue per la prima volta è necessario creare il database, per far ciò basta eseguire il migrate dell'applicazione.
```
php artisan migrate
```
Avviare la coda dei job per la gestione e l'invio dell'email automatiche.
```
php artisan queue:work
```
Infine lanciare il server integrato nel progetto.
```
php artisan serve
```
A questo punto basterà avviare il proprio browser all'indirizzo (di default la porta è 8000)
```
http://localhost:port/
```
Se si vuole accedere all'area dell'amministratore:
```
http://localhost:port/login_ad/admin
```