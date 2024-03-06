<?
    //подключаем пролог ядра bitrix
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    //устанавливаем заголовок страницы
    $APPLICATION->SetTitle("AJAX");

    //подключаем битриксовый аякс
    CJSCore::Init(array('ajax'));
        //создается переменная для проверки
        $sidAjax = 'testAjax';
        //провереем пришелшие данные на пустоту и проверяем то ли нам пришло
        if(isset($_REQUEST['ajax_form']) && $_REQUEST['ajax_form'] == $sidAjax){
            //Очищает выходной буфер, чтобы подготовить его к отправке ответа AJAX.
            $GLOBALS['APPLICATION']->RestartBuffer();
            //Преобразует массив PHP в строку JSON и выводит ее
            echo CUtil::PhpToJSObject(array(
                        //Добавляет ключ RESULT со значением 'HELLO'
                        'RESULT' => 'HELLO',
                        //Добавляет ключ ERROR с пустой строкой
                        'ERROR' => ''
        ));
    //Останавливает выполнение скрипта
    die();
    }

?>
	<div class="group">
		<div id="block"></div>
		<div id="process">wait ... </div>
	</div>
	<script>
    //Устанавливает флаг отладки для фреймворка Bitrix, чтобы включить подробную информацию об отладке
	window.BXDEBUG = true;

    //Определяет функцию JavaScript с именем DEMOLoad, которая будет вызываться для загрузки данных с сервера
	function DEMOLoad() {
        //Скрывает элемент DOM с идентификатором "block"
		BX.hide(BX("block"));
        //Показывает элемент DOM с идентификатором "process"
		BX.show(BX("process"));
        //Выполняет асинхронный запрос AJAX для загрузки данных JSON с указанного URL-адреса и вызывает функцию DEMOResponse с полученными данными
		BX.ajax.loadJSON('<?=$APPLICATION->GetCurPage()?>?ajax_form=<?=$sidAjax?>', DEMOResponse);
	}

    //Определяет функцию JavaScript с именем DEMOResponse, которая будет вызываться при получении ответа на запрос AJAX
	function DEMOResponse(data) {
        //Выводит сообщение об отладке с данными, полученными от сервера
		BX.debug('AJAX-DEMOResponse ', data);
        //Обновляет содержимое элемента DOM с идентификатором "block" с результатами, полученными от сервера
		BX("block").innerHTML = data.RESULT;
        //Показывает элемент DOM с идентификатором "block"
		BX.show(BX("block"));
        //Скрывает элемент DOM с идентификатором "process"
		BX.hide(BX("process"));
        //Вызывает пользовательское событие с именем 'DEMOUpdate' для элемента DOM с идентификатором "block". Это позволяет другим частям приложения реагировать на обновление данных
		BX.onCustomEvent(BX(BX("block")), 'DEMOUpdate');
	}

    //Ожидает загрузки DOM и вызывает анонимную функцию, когда он будет готов
	BX.ready(function() {
        //Код который добавляет пользовательское событие с именем 'DEMOUpdate' к элементу DOM с идентификатором "block". Когда это событие срабатывает, оно перезагружает текущую страницу
		/*
		BX.addCustomEvent(BX("block"), 'DEMOUpdate', function(){
		   window.location.href = window.location.href;
		});
		*/
        //Скрывает элемент DOM с идентификатором "block"
		BX.hide(BX("block"));
        //Скрывает элемент DOM с идентификатором "process"
		BX.hide(BX("process"));
        //Привязывает обработчик событий к элементу body для событий click с делегированием по классу css_ajax. Когда пользователь нажимает на элемент с классом css_ajax, вызывается анонимная функция
		BX.bindDelegate(document.body, 'click', {
			className: 'css_ajax'
		}, function(e) {
            //Проверяет, существует ли объект события e, и если нет, устанавливает его в объект события window.event
			if(!e) e = window.event;
            //Вызывает функцию DEMOLoad, которая загружает данные с сервера
			DEMOLoad();
            //Предотвращает выполнение действия по умолчанию для события click, например, переход по ссылке
			return BX.PreventDefault(e);
		});
	});
	</script>
	<div class="css_ajax">click Me</div>
	<?
//подключаем эпилог ядра bitrix
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>