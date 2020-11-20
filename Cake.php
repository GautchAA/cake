<?php
setlocale(LC_ALL, "ru_RU.UTF-8");

class Cake {

    public static function revertCharacters($str){
      //Получаю все символы соединяющие слова
      preg_match_all("/[^а-яА-Я]/u", $str, $match);

      //Получаю все слова
      $str = preg_split("/[^а-яА-Я]/u", $str);
      //Прохожу по каждому слову
      foreach ($str as $i => $value) {
        //Преобразовываем строку в массив
        preg_match_all("/./u", $str[$i], $str[$i]);
        $str[$i] = $str[$i][0];

        //Получаем индексы символов в верхнем регистре
        $indexes = preg_grep("/[А-Я]/u", $str[$i]);

        //Все символы верхнего регистра преобразовываем в нижний
        foreach (array_keys($indexes) as $index) {
          $str[$i][$index] = mb_strtolower($str[$i][$index]);
        }
        //Разворачиваем слова
        $str[$i] = array_reverse($str[$i]);

        //По темже индексам преобразуем символы в верхний регистр
        foreach (array_keys($indexes) as $index) {
          $str[$i][$index] = mb_strtoupper($str[$i][$index]);
        }
        //Соединяем массив в строку
        $str[$i] = implode($str[$i]);

        //Добавляем к слову следующие за ним соединяющие символы
        if ($i < count($str)-1) {
          $str[$i] .= $match[0][$i];
        }
      }
      //Возвращаем измененную строку
      return implode($str);
    }
}
 ?>
