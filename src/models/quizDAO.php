<?php

/**
 * @return mixed
 */
function getAllQuiz(){
    $quizFile = "quiz.json";
    $content = file_get_contents(ROOT_PATH."/src/data/$quizFile");
    return json_decode($content,true);
}

/**
 * @param int $questionNumber
 * @return mixed
 */
function getQuestion(int $questionNumber) {
    $allQuizz = getAllQuiz();
    return ($questionNumber < count($allQuizz))?$allQuizz[$questionNumber]:null;
}

/**
 * @param int $questionNumber
 * @param $answerNumber
 * @return bool
 */
function isGoodAnswer(int $questionNumber, $answerNumber) {
    return (getQuestion($questionNumber)["goodAnswer"] == $answerNumber) ? true :false;
}

/**
 * @param array $answers
 * @return int
 */
function getScore(array $answers):array {
    $allQuizz = getAllQuiz();
    $score = 0;
    for ($i = 0;$i < count($allQuizz);$i++) {
        if ($allQuizz[$i]["goodAnswer"] == $answers[$i]){
            $score ++ ;}
    };
    return ["score" => $score,"total" => count($allQuizz) ];

}

