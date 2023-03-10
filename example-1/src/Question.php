<?php

namespace App;

class Question
{
    protected string $body;
    protected string $solution;
    protected string $answer;
    protected string $correct;

    public function __construct(string $body, string $solution)
    {
        $this->body = $body;
        $this->solution = $solution;
    }

    public function answer(string $answer)
    {
        $this->answer = $answer;
        return $this->solved();
    }

    public function answered(): bool
    {
        return isset($this->answer);
    }

    public function solved(): ?string
    {
        return $this->answer === $this->solution;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}