<?php

namespace App;

use Exception;

class Quiz
{
    protected Questions $questions;
    protected int $currentQuestion = 1;

    public function __construct()
    {
        $this->questions = new Questions();
    }

    public function addQuestion(Question $question)
    {
//        $this->questions[] = $question;
        $this->questions->add($question);
    }

    public function questions()
    {
        return $this->questions;
    }

    public function nextQuestion()
    {
//        if (!isset($this->questions[$this->currentQuestion - 1])) {
//            return false;
//        }
//
//        $question = $this->questions[$this->currentQuestion - 1];
//        $this->currentQuestion++;
//        return $question;
        return $this->questions->next();

    }

    public function isComplete(): bool
    {
        return count($this->questions->answered()) === $this->questions()->count();
    }

    public function grade()
    {
        if (! $this->isComplete()) {
            throw new Exception('Quiz is not complete');
        }

        $correct = count($this->correctlyAnsweredQuestions());
        return ($correct / $this->questions->count()) * 100;
    }

    protected function correctlyAnsweredQuestions()
    {
        return $this->questions->solved();
    }
}