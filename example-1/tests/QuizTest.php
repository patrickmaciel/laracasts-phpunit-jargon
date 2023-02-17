<?php

namespace Tests;

use App\Question;
use App\Quiz;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{
    /** @test */
    public function it_consists_of_questions()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(
            new Question('What is 2 + 2?', 4)
        );
        $this->asserTcount(1, $quiz->questions());
    }

    /** @test */
    public function it_grades_a_perfect_quiz()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(
            new Question('What is 2 + 2?', 4)
        );

        // take the quiz
        $question = $quiz->nextQuestion();
        $question->answer(4);

        // grade the quiz
        $this->assertEquals(100, $quiz->grade());
    }

    /** @test */
    public function it_grades_a_failed_quiz()
    {
        $quiz = new Quiz();
        $quiz->addQuestion(
            new Question('What is 2 + 2?', 4)
        );

        // take the quiz
        $question = $quiz->nextQuestion();
        $question->answer('incorrect answer');

        // grade the quiz
        $this->assertEquals(0, $quiz->grade());
    }

    /** @test */
    public function it_cannot_be_graded_until_all_questions_have_been_answered()
    {
        $quiz = new Quiz;
        $quiz->addQuestion(
            new Question('Who is my savior?', 'Jesus')
        );

        $grade = $quiz->grade();
        $this->assertEquals(0, $grade);
    }

    /** @test */
    public function it_correctly_tracks_the_next_question_in_the_queue()
    {
        $quiz = new Quiz;
        $quiz->addQuestion(
            new Question('Who is my savior?', 'Jesus')
        );

        $question = $quiz->nextQuestion();
        $this->assertSame('Who is my savior?', $question->getBody());

        $quiz->addQuestion(
            new Question('Who is my wife?', 'Aline')
        );

        $question = $quiz->nextQuestion();
        $this->assertSame('Who is my wife?', $question->getBody());
    }
}