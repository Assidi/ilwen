$(".button-text").click(function(){ 
    
    // определяем, какую кнопку нажали
   var n = $(this).attr("data-text");   
   
   // это положение курсора 
   // вопрос, что с ним делать дальше?
   var p = $("#mytextarea").prop('selectionStart');   
   // это текст в текстовой области
   var text = $("#mytextarea").val();
   // это текст до курсора
   var text1 = text.slice(0,p);
   // это текст после курсора
   var text2 = text.slice(p);
               
   var textInsert1;
   var textInsert2;
   switch(n) {
       case "0":
           textInsert1 = "<b>";
           textInsert2 = "</b>";
           break;
       case "1":
           textInsert1 = "<i>";
           textInsert2 = "</i>";
           break;
       case "2":
           textInsert1 = "<u>";
           textInsert2 = "</u>";
           break;
       case "3":
           textInsert1 = "<s>";
           textInsert2 = "</s>";
           break;
       case "4":
           textInsert1 = "<div align=\"center\">";
           textInsert2 = "</div>";
           break;
       case "5":
           textInsert1 = "<div align=\"right\">";
           textInsert2 = "</div>";
           break;
       case "6":
           textInsert1 = "<a href=\"\">";
           textInsert2 = "</a>";
           break;
       case "7":
           textInsert1 = "<span class=\"note\" title=\"";
           textInsert2 = "\">*</span>";
           break;
       default: 
           textInsert1 = "";
           textInsert2 = "";
           break;
       
   }
   // пишем получившуюся величину
   // вот еще бы курсорчик туда в середку вставить!
   var l1 = text1.length;
   var l2 = textInsert1.length;
   var l = l1+l2;   
   var selection =  get_selection();
   // получаем выделение текста
   // если оно есть, мы должны заключить его в тэги, а из оставшего текста убрать. 
   if (selection) {
        var lsel = selection.length;
        // отрезаем выделение из оставшегося куска текста
        text2 = text2.slice(lsel);
        // и копируем его между тэгами
        $("#mytextarea").val(text1+textInsert1+selection+textInsert2+text2);
        
   }
   else 
   {
        // если выделение нет, просто вставляем оба куска тэга
        $("#mytextarea").val(text1+textInsert1+textInsert2+text2);         
   }
   
   $("#mytextarea").focus();
   // а теперь вставляем курсор туда, куда надо
   setCaretToPos(document.getElementById("content"),l);
        });
        
function setSelectionRange(input, selectionStart, selectionEnd) {
    if (input.setSelectionRange) {
           input.focus();
           input.setSelectionRange(selectionStart, selectionEnd);
    }
    else if (input.createTextRange) {
           var range = input.createTextRange();
           range.collapse(true);
           range.moveEnd('character', selectionEnd);
           range.moveStart('character', selectionStart);
           range.select();
    }
}
         
function setCaretToPos (input, pos) {
    setSelectionRange(input, pos, pos);
}

function get_selection() {
    // Флаги для определения браузеров
    var uagent    = navigator.userAgent.toLowerCase();
    var is_safari = ( (uagent.indexOf('safari') != -1) || (navigator.vendor == "Apple Computer, Inc.") );
    var is_ie     = ( (uagent.indexOf('msie') != -1) && (!is_opera) && (!is_safari) && (!is_webtv) );
    var is_ie4    = ( (is_ie) && (uagent.indexOf("msie 4.") != -1) );
    var is_moz    = (navigator.product == 'Gecko');
    var is_ns     = ( (uagent.indexOf('compatible') == -1) && (uagent.indexOf('mozilla') != -1) && (!is_opera) && (!is_webtv) && (!is_safari) );
    var is_ns4    = ( (is_ns) && (parseInt(navigator.appVersion) == 4) );
    var is_opera  = (uagent.indexOf('opera') != -1);  
    var is_kon    = (uagent.indexOf('konqueror') != -1);
    var is_webtv  = (uagent.indexOf('webtv') != -1);
    
    var is_win    =  ( (uagent.indexOf("win") != -1) || (uagent.indexOf("16bit") !=- 1) );
    var is_mac    = ( (uagent.indexOf("mac") != -1) || (navigator.vendor == "Apple Computer, Inc.") );
    var ua_vers   = parseInt(navigator.appVersion);
    var selection = null;
    // сама функция
	var textarea = document.getElementById('content');
    if ((ua_vers >= 4) && is_ie && is_win) {
        if (textarea.isTextEdit) {
            textarea.focus();
            var sel = document.selection;
            var rng = sel.createRange();
            rng.collapse;
            if((sel.type == "Text" || sel.type == "None") && rng != null)
                selection = rng.text;
        }
    } else if (typeof(textarea.selectionEnd) != "undefined" ) { 
        selection = (textarea.value).substring(textarea.selectionStart, textarea.selectionEnd);
    }
    return selection;
}	      
