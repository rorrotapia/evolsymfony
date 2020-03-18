<?php


namespace App\Service\Form;


class FormSearch implements FormInterface
{
    /**
     * @var string
     */
    private $submitName;
    private $validation = true;
    private $city;
    private $cp;

    /**
     * RegisterForm constructor.
     */
    public function __construct(string $submitName)
    {
        $this->submitName = $submitName;
    }

    public function isSubmit(): bool
    {
        return isset($_POST[$this->submitName]);
    }

    public function setData(...$fields): void
    {
        $this->city = trim($fields[0]);
        $this->cp = trim($fields[1]);
    }

    public function validate(): void
    {
        if(empty($this->city)){
            //FlashMessage::Add("exclamation", "Le nom est vide");
            $this->validation = false;
        }

        if(empty($this->cp)){
            //FlashMessage::Add("exclamation", "L'cp est vide");
            $this->validation = false;
        }
    }

    public function isValid(): bool
    {
        return $this->validation;
    }

    public function getData(): array
    {
        return [
            "city" => $this->city,
            "cp" => $this->cp,
        ];
    }
}