<?php
$questions_and_answers_faq = get_field('questions_and_answers_faq', 'options');
$section_title_faq = get_field('section_title_faq', 'options');
?>

<div class="faq">
    <div class="container">
        <div class="faq__wrapper">
            <h2 class="faq__section-title">
                <?php if( $section_title_faq ) { echo $section_title_faq ;} ?>
            </h2>
            <ul class="faq__questions">
                <?php if( $questions_and_answers_faq ) : foreach ( $questions_and_answers_faq as $item ) :
                    $question_faq = $item["question_faq"];
                    ?>
                    <li class="faq__question-item">
                        <h5 class="faq__question-item-text"><?php if( $question_faq ) { echo $question_faq ;} ?></h5>
                    </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="faq__answers">
                <?php if( $questions_and_answers_faq  ) : foreach ( $questions_and_answers_faq  as $item ) :
                    $question_faq = $item["question_faq"];
                    $answer_faq = $item["answer_faq"];
                    ?>
                        <div class="faq__answer-item">
                            <h5 class="faq__answer-item-question">
                                <?php if( $question_faq ) { echo $question_faq ;} ?>
                            </h5>
                            <p class="faq__answer-item-answer">
                                <?php if( $answer_faq ) { echo $answer_faq ;} ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
