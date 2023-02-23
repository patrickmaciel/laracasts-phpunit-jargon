<?php

namespace App;

class Questions implements \Countable
{
    protected array $questions;

    public function __construct($questions = [])
    {
        $this->questions = $questions;
    }

    public function add(Question $question)
    {
        $this->questions[] = $question;
    }

    public function count(): int
    {
        return count($this->questions);
    }

    public function next()
    {
        $question = current($this->questions);
        next($this->questions);
        return $question;
    }

    public function remaining()
    {
        return array_filter($this->questions, static fn($q) => !$q->answered());
    }

    public function answered()
    {
        return array_filter(
            $this->questions,
            static fn($q) => $q->answered());
    }

    public function solved()
    {
        // video https://laracasts.com/series/php-testing-jargon/episodes/7
        // 12:19
        return array_filter(
            $this->questions,
            static fn(Question $question) => $question->solved()
        );
    }
}