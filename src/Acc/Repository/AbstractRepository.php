<?php

namespace Acc\Repository;

abstract class AbstractRepository {

    protected static $entityName = '';
    protected static $tableName = '';
    protected static $mapping = [];
    protected static $key = 'id';

    public function __construct() {
        if (!static::$tableName) {
            static::$tableName = static::_getTableNameFromClassName();
        }
        static::$entityName = "\Acc\Entity\\" . static::_camelize(static::$tableName);
    }

    /**
     * 
     * @param array $properties
     * @return Entity
     */
    public function findOneBy($properties = []) {
        return $this->_findBy($properties, 1);
    }

    public function findAllBy($properties = []) {
        return $this->_findBy($properties, 0);
    }

    /**
     * 
     * @param array $properties
     * @return Entity
     */
    protected function _findBy($properties, $limit) {
        $sql = "SELECT * FROM " . static::$tableName;
        $where = [];
        foreach ($properties as $key => $value) {
            $where[] = "$key = :$key";
        }
        if ($where) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        if ($limit > 0) {
            $sql .= ' LIMIT ' . (int) $limit;
        }
        $sth = \Acc\Util\Db::$sql->prepare($sql);
        foreach ($properties as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        $result = [];
        while ($row = $sth->fetch(\PDO::FETCH_ASSOC)) {
            $entity = new static::$entityName();
            foreach ($row as $key => $value) {
                $entity->{"set" . static::_camelize($key)}($value);
            }
            $result[] = $entity;
        }
        return $result;
    }

    /**
     * 
     * @param Entity $entity
     * @return bool
     */
    public function create($entity) {
        $sql = "INSERT INTO " . static::$tableName;
        foreach (static::$mapping as $entityAttr => $sqlCol) {
            $set[] = "$sqlCol = :$entityAttr";
        }
        if (!$set) {
            throw new \Exception("SQL INSERT No data : " . static::$tableName . serialize($entity));
        }
        $sql .= ' SET ' . implode(' , ', $set);
        $sth = \Acc\Util\Db::$sql->prepare($sql);
        foreach (static::$mapping as $entityAttr => $sqlCol) {
            $sth->bindValue(":$entityAttr", $entity->{"get" . ucfirst($entityAttr)}());
        }
        $ret = $sth->execute();
        if (!$ret) {
            throw new \Exception("SQL INSERT error : " . static::$tableName . serialize($sth->errorInfo()));
        }
        return $ret;
    }

    public function update($entity) {
        $sql = "UPDATE " . static::$tableName;
        foreach (static::$mapping as $entityAttr => $sqlCol) {
            if (static::$key != $entityAttr) {
                $set[] = "$sqlCol = :$entityAttr";
            }
        }
        if (!$set) {
            throw new \Exception("SQL UPDATE No data : " . static::$tableName . serialize($entity));
        }
        $sql .= ' SET ' . implode(' , ', $set);
        $sql .= ' WHERE ' . static::$key . ' = :' . static::$key;
        $sth = \Acc\Util\Db::$sql->prepare($sql);
        foreach (static::$mapping as $entityAttr => $sqlCol) {
            $sth->bindValue(":$entityAttr", $entity->{"get" . ucfirst($entityAttr)}());
        }
        $ret = $sth->execute();
        if (!$ret) {
            throw new \Exception("SQL UPDATE error : " . static::$tableName . serialize($sth->errorInfo()));
        }
        return $ret;
    }

    public function delete($entity) {
        $sql = "DELETE FROM " . static::$tableName;
        $sql .= ' WHERE ' . static::$key . ' = :' . static::$key;
        $sth = \Acc\Util\Db::$sql->prepare($sql);
        $sth->bindValue(":" . static::$key, $entity->{"get" . ucfirst(static::$key)}());
        $ret = $sth->execute();
        if (!$ret) {
            throw new \Exception("SQL DELETE error : " . static::$tableName . serialize($sth->errorInfo()));
        }
        return $ret;
    }

    /**
     * transform an array to an entity
     * 
     * @param array $array
     */
    protected function load($array) {
        
    }

    //

    protected static function _getTableNameFromClassName() {
        $start = strrpos(get_called_class(), "\\") + 1;
        $end = -strlen('Repository');
        return strtolower(substr(get_called_class(), $start, $end));
    }

    /**
     * https://api.drupal.org/api/drupal/core!vendor!symfony!dependency-injection!Symfony!Component!DependencyInjection!Container.php/8
     *  $tests = array(
      'simpleTest' => 'simple_test',
      'easy' => 'easy',
      'HTML' => 'html',
      'simpleXML' => 'simple_xml',
      'PDFLoad' => 'pdf_load',
      'startMIDDLELast' => 'start_middle_last',
      'AString' => 'a_string',
      'Some4Numbers234' => 'some4_numbers234',
      'TEST123String' => 'test123_string',
      );
     *
     * @param string $string
     * @return string
     */
    protected static function _decamelize($string) {
        return strtolower(
                preg_replace(
                        array('/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/')
                        , array('\\1_\\2', '\\1_\\2')
                        , strtr($string, '_', '.')
                )
        );
    }

    /**
     * https://api.drupal.org/api/drupal/core!vendor!symfony!dependency-injection!Symfony!Component!DependencyInjection!Container.php/8
     *  $tests = array(
      'simple_test' => 'simpleTest',
      'again_a_simple_test' => 'againASimpleTest',
      );
     *
     * @param string $string
     * @return string
     */
    protected static function _camelize($string) {
        return strtr(
                ucwords(
                        strtr(
                                $string
                                , array('_' => ' ', '.' => '_ ', '\\' => '_ ')
                        )
                )
                , array(' ' => '')
        );
    }

}
