$(document).ready(function() {
    console.log('okfffff')
    //прикрепляем клик по заголовкам acc-head
    $('.faq__question-item-text').on('click', f_acc);

});


function f_acc(){
    console.log('ok')
//скрываем все кроме того, что должны открыть
    $('.faq__answer-item').not($(this).next()).slideUp(1000);
// открываем или скрываем блок под заголовком, по которому кликнули
    $(this).next().slideToggle(2000);
}

