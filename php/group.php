<?php
 
class Group
{
    private $name;
    private $teams = [];
 
    public function __construct($name, Group $group = NULL)
    {
        $this->name = $name;
        if ($group !== NULL) {
            $count = count($group->teams);
            for ($i = 0; $i < $count; $i++) {
                $this->teams[] = $group->teams[$i];
            }
        }
    }
 
    public function __toString()
    {
        return $this->name;
    }
 
    public function addTeam(Team $team)
    {
        $this->teams[count($this->teams)] = $team;
        return $this;
    }
 
    public function generateCalendar()
    {
        if (count($this->teams) % 2 !== 0) //Проверка деления команд
            array_push($this->teams, "slip"); //Пропуск игры если не пары
 
        $count = count($this->teams); //кол-во игр
        $row2 = array_splice($this->teams, ($count / 2)); //удаления части массива и замена части массива
        $row1 = $this->teams;
        $row2 = array_reverse($row2);

        for ($i = 1; $i < $count; $i++) {
            echo $this->name . ". Round $i <br /> <br />"; //отрисовка раунда 
            if ($i == 1) 
            {   
                for ($j = 0; $j < $count / 2; $j++) 
                { 
                    if ($row1[$j] !== "slip" && $row2[$j] !== "slip") //проверка на пару
                        echo $row1[$j] . ' - ' . $row2[$j] . '<br />' . '<br />'; //отрисовка матча
                    else continue; //если нет пары, продолжаем игру
                }
            } 
            else 
            {  
                array_push($row2, array_pop($row1));
                $first = array_shift($row1); //извлекаем первый элемент
                array_unshift($row1, array_shift($row2)); //добавляем элемент в начало массива
                array_unshift($row1, $first);  
                for ($j = 0; $j < $count / 2; $j++) //цикл кол-во игр
                    if ($row1[$j] !== "slip" && $row2[$j] !== "slip") //проверка на пару
                        echo $row1[$j] . ' - ' . $row2[$j] . '<br />' . '<br />'; //отрисовка матча
                    else continue; //если нет пары, продолжаем
            }
        }
    }
}

?>
