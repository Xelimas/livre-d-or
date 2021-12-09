<?php

class Message
{
    const LIMIT_PSEUDO = 3;
    const LIMIT_MESSAGE = 10;
    protected $pseudo;
    protected $message;
    protected $date;

    public static function FromJSON(string $json): Message
    {
        $data = json_decode($json, true);
        return new Message($data['pseudo'], $data['message'], new DateTime("@" . $data['date']));
    }

    public function __construct(string $pseudo, string $message, ?DateTime $date = null)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->pseudo) < self::LIMIT_PSEUDO) {
            $errors['pseudo'] = 'votre pseudo est trop court';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $errors['message'] = 'votre message est trop court';
        }
        return $errors;
    }

    public function toHTML(): string
    {
        $pseudo = htmlentities($this->pseudo);
        $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
        $date = $this->date->format('d/m/Y à H:i');
        $message = nl2br(htmlentities($this->message));
        return <<<HTML
        <p>
        <strong>{$pseudo}</strong> <em>le {$date}</em>
        <br> {$message}
    </p>
    HTML;
    }

    public function toJSON(): string
    {

        return json_encode([
            'pseudo' => $this->pseudo,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
}
