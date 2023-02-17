<?php

namespace App;

class Quiz
{
    protected array $questions;
    protected int $pointer = -1;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion(): Question
    {
        return $this->questions[++$this->pointer];
    }

    public function grade()
    {
        $correct = count($this->correctlyAnsweredQuestions());
        return ($correct / count($this->questions)) * 100;
    }

    protected function correctlyAnsweredQuestions()
    {
        return array_filter(
            $this->questions,
            static fn(Question $question) => $question->solved());
    }
}