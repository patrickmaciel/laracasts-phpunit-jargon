<?php

namespace App;

class Quiz
{
    protected array $questions;
    protected int $currentQuestion = 1;

    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
        if (!isset($this->questions[$this->currentQuestion - 1])) {
            return false;
        }

        $question = $this->questions[$this->currentQuestion - 1];
        $this->currentQuestion++;
        return $question;
    }

    public function isComplete(): bool
    {
        $answeredQuestions = count(
            array_filter(
                $this->questions,
                static fn(Question $question) => $question->answered()
            )
        );
        $totalQuestions = count($this->questions);
        return $answeredQuestions === $totalQuestions;
    }

    public function grade()
    {
        if (! $this->isComplete()) {
            throw new \Exception('Quiz is not complete');
        }

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