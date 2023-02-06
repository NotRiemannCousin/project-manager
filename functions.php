<?php

// include()
class My
{
    static function CheckDate($str)
    {
        $d = substr($str, 8, 2);
        $m = substr($str, 5, 2);
        $y = substr($str, 0, 4);

        if (!checkdate($m, $d, $y))
            return false;

        return DateTime::createFromFormat('d-m-Y G:i:s', "$d-$m-$y 00:00:00");
    }

    static function DeleteTasks(array $ids)
    {
        R::trashAll(R::loadAll('tarefa', $ids));
    }

    static function DeleteAlocations(array $ids)
    {
        $ids_list = array();
        foreach($ids as $id)
            $ids_list += R::getCol('SELECT id FROM tarefa WHERE alocacao_id = '.$id);
        My::DeleteTasks($ids_list);

        R::trashAll(R::loadAll('alocacao', $ids));
    }

    static function DeleteProjects(array $ids)
    {
        $ids_list = array();
        foreach($ids as $id)
            $ids_list += R::getCol('SELECT id FROM alocacao WHERE projeto_id = '.$id);
        My::DeleteAlocations($ids_list);

        $r = R::trashAll(R::loadAll('projeto', $ids));
    }

    static function DeleteDevelopers(array $ids)
    {
        $ids_list = array();
        foreach($ids as $id)
            $ids_list += R::getCol('SELECT id FROM alocacao WHERE desenvolvedor_id = '.$id);
        My::DeleteAlocations($ids_list);

        R::trashAll(R::loadAll('desenvolvedor', $ids));
        R::trashAll(R::loadAll('credencial', $ids));
    }
}
