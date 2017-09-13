<?php
    class Helper {
    /**
	 * Заменяет переводы строки на <br> 
	 * @param текст
	 * @return текст с переводами строк для вывода на экран
	 */
	static function insertBreakes($text) {
		$newtext = preg_replace('/[\r\n]+/', "<br />", $text);
		return $newtext;
	} 
        
	/**
	 * форматирует дату из системной 
	 * @param $date системная дата
	 * @return нормальная дата и время для вывода на экран
	 */
    static function dateFormat($date) {
        $datetime = date("d.m.Y H:i", $date);
        return $datetime;
    }
    
    /**
	 * Заменяет переводы строки на абзацы 
	 * @param текст
	 * @return текст с тэгами абзаца для вывода на экран
	 */
    
    static function insertParagraph($text) {
        $text1 = preg_replace("/[\r\n]+/", "</p><p>", $text);
        return $text1;
    }
    
    /**
	 * Считает количество слов в тексте 
	 * @param текст
	 * @return количество слов
	 */
    
    static function countWords($text) {
        // сразу удаляем переводы строк
        $text1 = preg_replace("/[\r\n]+/", " ", $text);
        // символы, которые не являются словами и считать их не надо
        // запятая и точка включены на случай невнимательного автора
        $symbols = array("—", "-", "\n", ",", ".");
        // разбиваем текст на слова
        $arr = explode(' ',$text1);
        // число полученных фрагментов        
        $nwords = count($arr);
        // счетчик знаков препинания
        $n = 0;
        for($i = 0; $i<$nwords; $i++) {
            // берем очередной фрагмент и смотрим его длину
            $s = $arr[$i];
            $l = mb_strlen($s,'UTF-8');        
            if ($l == 1) {            
                // если это знак препинания, увеличиваем счетчик
                if (in_array($s, $symbols)) $n++;                
            }  
            // мало ли, врагмент с нулевой длиной, его тоже за слово не считаетм 
            if ($l == 0) $n++;       
        }
        // вычитаем лишние знаки
        $nwords =  $nwords - $n; 
        return $nwords;
    }
    
  }
?>