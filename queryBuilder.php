<?php

namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class queryBuilder{

    private $pdo;
    private $queryFactory;

    public function __construct()
    {
        // a PDO connection
        $this->pdo = new PDO('mysql:host=localhost; dbname=app3; charset=utf8;', 'admin', '1234');
        // Новый экземпляр класса QueyFactory - Завод запросов
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function getAll($table){
        // Создаем новый SELECT
                $select = $this->queryFactory->newSelect();
        // Описываем что конкретно запрашиваем из базы
                $select->cols(['*'])
                    ->from($table);

        // prepare the statement
                $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
                $sth->execute($select->getBindValues());
        // get the results back as an associative array
                return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $id){
        // Создаем новый SELECT
            $select = $this->queryFactory->newSelect();
        // Описываем что конкретно запрашиваем из базы
            $select->cols(['*'])
                ->from($table)
                ->where('id = :id')
                ->bindValue("id", $id);

        // prepare the statement
            $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
            $sth->execute($select->getBindValues());
        // get the results back as an associative array
            return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data, $table){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);
        //var_dump($insert->getStatement());die;
        // prepare the statement
        $sth = $this->pdo->prepare($insert->getStatement());
        // execute with bound values
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $data, $id){
        $update = $this->queryFactory->newUpdate();

        $update->table($table)           // update this table
                ->cols($data)
                ->where('id = :id')
                ->bindValue('id', $id);

        // prepare the statement
        $sth = $this->pdo->prepare($update->getStatement());

        // execute with bound values
        $sth->execute($update->getBindValues());
    }

    public function delete($id, $table){
    $delete = $this->queryFactory->newDelete();

    $delete
        ->from($table)                   // FROM this table
        ->where('id = :id')        // OR WHERE these conditions
        ->bindValue('id', $id);
        // prepare the statement
        $sth = $this->pdo->prepare($delete->getStatement());

        // execute with bound values
        $sth->execute($delete->getBindValues());
    }

}