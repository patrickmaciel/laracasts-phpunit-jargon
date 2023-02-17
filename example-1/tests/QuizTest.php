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

        $this->expectException(\Exception::class);
        $quiz->grade();
    }

    /** @test */
    public function it_correctly_tracks_the_next_question_in_the_queue()
    {
        $quiz = new Quiz;
        $quiz->addQuestion($question1 = new Question('Who is my savior?', 'Jesus'));
        $quiz->addQuestion($question2 = new Question('Who is my wife?', 'Aline'));

        $this->assertSame($question1, $quiz->nextQuestion());
        $this->assertSame($question2, $quiz->nextQuestion());
    }

    /** @test */
    public function it_return_falses_if_there_are_not_remaining_next_questions()
    {
        $quiz = new Quiz;
        $quiz->addQuestion($question1 = new Question('Who is my savior?', 'Jesus'));
        $quiz->nextQuestion();
        $this->assertFalse($quiz->nextQuestion());
    }
}