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
        if(empty($this->city) || !preg_match('/[a-zA-Z-ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ_-\s]/', $this->city)) {
            $this->validation = false;
        }

        if (empty($this->cp) || !preg_match('/^\d{5}/', $this->cp)) {
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