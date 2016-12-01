jQuery(document).ready(function($) {
    //////////////////////ажакс!!//////////////////////////

    $(window).scroll(function()
    {
        if($(window).scrollTop()+$(window).height()+1 >= $(document).height()){
            download_content();
        }
    });
    // маркер конца контента на сайте
    var end_of_content = false;
    // маркер запрос отправлен
    var post_send = false;
    // колличество постов нужно для ажакса
    var post_count = parseInt(abv_ajax['post_count']);


    // получить контент
    function download_content(){
        //если не конец контента и не запрос отправлен то виполняем
        if(!post_send && !end_of_content){
            // включаем маркер запрос отправлен
            post_send = true;
            // формируем заапрос
            var data = {
                action: 'abv_ajax',
                post_count: post_count,
                nonce:abv_ajax.nonce
            };
            // скорей всего красній шарик
            $('.loading-overlay').fadeIn();
            // отравляем запрос
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
                        $('.load_more').fadeOut();
                    }
                    // строку закидіваем в дом итемс
                    var items = $(str);
                    // ответ ажакс закидівем во временную переменную
                    var items_temp = $(response);
                    // ко временной переменной применяем слик
                    var new_items = $('.slick',items_temp).slick(slick_option);

                    // закидіваем итемс с примененнім к нему сликом в масонри
                    // збрасівает на неправельніе позиции
                    grid.append(items).masonry('appended', items);

                    // заменяем итемс неинициализированые масонри на инициализированые
                    var n = 0;
                    $.each(items, function(i){
                        if ( $(this).hasClass('grid-item')){
                            $('.slick',this).replaceWith(new_items[n]);
                            //$('.slick',this).slick('setPosition', 0);
                            n += 1;
                        }
                    });

                    // віставляем все слики на первую позицию
                    $( ".slick" ).slick('setPosition', 0);

                    // попітка использовать имейдже лоад

                    // реинициализация масонри любая приводит к пріжку в том числе ресайз окна
                    //setTimeout(function(){grid.masonry('layout');}, 500);
                    // отключаем шарик
                    $('.loading-overlay').fadeOut();
                    // єто зачем ?
                    // slick_hover();
                    // накладівает филтр на все єлеенті
                    setTimeout(function(){checkFilter();}, 600);
                    // маркер получение окончено
                    post_send = false;
                    // получено постов удваеваем
                    post_count += post_count;

                    grid.imagesLoaded().progress( function() {
                        grid.masonry('layout');
                    });
                }
            });
            //alert(1);
        }
    }
});