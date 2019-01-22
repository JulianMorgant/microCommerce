<?php

/* v1
$question = $data["question"];
$answers = $data["answers"];
$goodAnswer = $data["goodAnswer"];

?>


<div>
<h1>--Quiz--</h1>
</div>

<div>
    <h2> <?=$question?> </h2>
</div>

<div>
   <form action="index.php?page=quiz&result=<?=$goodAnswer?>">
        <select class="custom-select" size="<?=(count($answers))?>" id="answer" name="answer">
            <label for="answer">Votre réponse : </label>
            <?php
            for ($i=0; $i<count($answers); $i++) {
                echo "<option value=".($i+1).">".$answers[$i]."</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>



</div>
<h2></h2>

*/
?>
<div>
    <?php if ($isPosted) : ?>

        <?php if (!$allQuestionAnswered) : ?>
            <div>
                <h1> Vous devez répondre à toutes les questions !!! </h1>
            </div>
        <?php endif; ?>

        <?php if ($allQuestionAnswered) : ?>

            <div>
                <h1> Résultats </h1>
                <p>
                    Votre score <?= $results["score"] ?> sur <?= $results["total"] ?>
                </p>


            </div>
        <?php endif; ?>
    <?php endif; ?>


    <form method="post">
        <?php for ($ind = 0; $ind < count($quizData); $ind++): ?>
            <div>

                <div>
                    <?php if ($allQuestionAnswered) {

                        if ($answers[$ind] == $quizData[$ind]["goodAnswer"]) {
                            echo "<h2 style = 'color : green'>" . $quizData[$ind]["question"] . "</h2>";
                        } else {
                            echo "<h2 style = 'color : red'>" . $quizData[$ind]["question"] . "</h2>";
                        };
                    } else {
                        echo "<h2>" . $quizData[$ind]["question"] . "</h2>";
                    }

                    ?>
                </div>

                <div>

                    <select class="custom-select" size="<?= (count($quizData[$ind]["answers"])) ?>" id="answer"
                            name="answers[<?= $ind ?>]" <?php if ($isPosted && $allQuestionAnswered) {
                        echo "disabled=\"true\"";
                    }; ?> >
                        <label for="answer">Votre réponse : </label>
                        <?php
                        for ($i = 0; $i < count($quizData[$ind]["answers"]); $i++) {
                            $j = $i + 1;
                            $htmlString = "";
                            $htmlString = "<option value=$j ";

                            if ($allQuestionAnswered) {
                                if ($answers[$ind] == $i + 1) {
                                    $htmlString .= " selected ";
                                }
                                if ($i == $quizData[$ind]["goodAnswer"] - 1) {
                                    $htmlString .= " style = 'color : green' ";
                                } else {
                                    $htmlString .= " style = 'color : red' ";
                                }


                            }
                            $htmlString .= ">" . $quizData[$ind]["answers"][$i] . "</option>";
                            echo $htmlString;
                        }
                        ?>
                    </select>


                </div>

            </div>
        <?php endfor; ?>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </form>

</div>