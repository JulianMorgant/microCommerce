<?php
// V2 seb


require ROOT_PATH . "/src/models/quizDAO.php";

$isPosted = filter_has_var(INPUT_POST, "submit");
$results = null;
$allQuestionAnswered = "";
$quizData = getAllQuiz();

if ($isPosted) {
    $answers = filter_input(
        INPUT_POST,
        "answers",
        FILTER_VALIDATE_INT,
        FILTER_REQUIRE_ARRAY);

    $allQuestionAnswered = count($answers) == count($quizData);
    if ($allQuestionAnswered) {
        $results = getScore($answers);
    }
}


echo getRenderedView("quiz", [
    "quizData" => $quizData,
    "isPosted" => $isPosted,
    "results" => $results,
    "allQuestionAnswered" => $allQuestionAnswered,
    "answers" => $answers ?? null]);


/* V1 pas top

require ROOT_PATH . "/src/models/quizDAO.php";

if (!isset($_SESSION["currentQuestion"])) {
    // init game
    $_SESSION["score"] = 0;
    $_SESSION["currentQuestion"] = 0;

} else {
    $lastResult = filter_input(
            INPUT_GET, "result",
            FILTER_SANITIZE_STRING
        ) ?? "false";
    $lastResponse = filter_input(
            INPUT_GET, "answer",
            FILTER_SANITIZE_STRING
        ) ?? "false";


    if ($lastResponse == $lastResult) {
        $_SESSION["score"] = $_SESSION["score"]++;
    };

    $_SESSION["currentQuestion"]++;

}




if (!getQuestion($_SESSION["currentQuestion"])) {
    // fin du quizz
    $_SESSION["score"] = 0;
    $_SESSION["currentQuestion"] = 0;
}
echo getRenderedView("quiz", getQuestion($_SESSION["currentQuestion"]));

*/


