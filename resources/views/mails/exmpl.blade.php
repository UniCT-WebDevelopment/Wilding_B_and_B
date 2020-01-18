@component('mail::message')
Email generata automaticamente,
La tua prenotazione sta per scadere. Riattivala!
Clicca qui per prolongare il tuo soggiorno
@component('mail::button', ['url' => $link])
Prolunga
@endcomponent
Cordiali saluti.
@endcomponent
