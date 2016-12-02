jQuery(document).ready(function($) {
    //////////////////////ажакс!!//////////////////////////


    $('#load_more').click(function(){
        download_content();
        return false;
    });

    // маркер конца контента на сайте
    var end_of_content = false;
    // маркер запрос отправлен
    var post_send = false;
    // колличество постов нужно для ажакса
    //var post_count = parseInt(abv_ajax['post_count']);


    // получить контент
    function download_content(){
        //если не конец контента и не запрос отправлен то виполняем
        if(!post_send && !end_of_content){
            // включаем маркер запрос отправлен
            post_send = true;

            var count_post = ($('.blog-items-list-container .post-text')).length;
            //console.log(abv_ajax.query_string);

            // формируем заапрос
            var data = {
                action: 'abv_ajax',
                nonce:abv_ajax.nonce,
                count_post: count_post,
                query_string:abv_ajax.query_string
            };

            $.post( abv_ajax.url, data, function(response) {
                // если есть ответ
                if(response){
                    // получаем рав ажакс и передаем в переменную
                    var str = response;
                    // ищем маркер конца контента с сайта
                    if(str.indexOf('_aexe5oel_end_of_content_aexe5oel_') + 1){
                        // если находим удаляем маркер
                        str.replace("_aexe5oel_end_of_content_aexe5oel_","");
                        // віставляем переменную блокировки новіх запросов
                        end_of_content = true;
                        // убираем надпись лоад мо
                        $('#load_more').fadeOut();
                    }
                    // строку закидіваем в дом итемс
                    var items = $(str);
                    //start
                    $('#append').before(items);
                    //end
                    // маркер получение окончено
                    post_send = false;
                }
            });
        }
    }
});