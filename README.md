## Livre d'or

-On aura une page avec un formulaire
    - Un champ pour le nom
    -un champ messsage
    -un bouton
Le formulaire devra être validé et on n'acceptera pas les pseudos de mon de 3 caractères ni les messages de moins de 10 caractères

- On créera un fichier "message" qui contiendra un message par ligne ( on utilisera serialize et un tableau ['unsername' =>'...'], 'message' =>)'...', 'date'=> '...'])
-pour sérializer les messages, on utilisera les fonctions json_encode(tableau) et json_decode(tableau, true)

-La page devra afficher tous les messages sous le formulaires de la maniere suivante :
<p>
    <strong>Pseudo</strong> <em>le dd/mm/YYYY à HHhMM</em>
    <br>
</p>
(Les sauts de lignes devront être conservés avec la fonction nl2br)

## Resctritions

-Utiliser une classe pour représenter un Message
    -new Message(String $username, string $message, DateTime $date)
    -isValid():bool
    -getErrors(): array
    -toHTML(): string
    -toJSON(): string
    -Message::fromJSON(string): Message

-utiliser une classe pour représenter le livre d'or(GuestBook)
    -new GuestBook($file)
    -addMessage(Message $Message)
    -getMessage(): array