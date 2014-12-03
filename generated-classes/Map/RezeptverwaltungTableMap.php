<?php

namespace Map;

use \Rezeptverwaltung;
use \RezeptverwaltungQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'rezeptverwaltung' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RezeptverwaltungTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RezeptverwaltungTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'notizen';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'rezeptverwaltung';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Rezeptverwaltung';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Rezeptverwaltung';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the fkrezept_id field
     */
    const COL_FKREZEPT_ID = 'rezeptverwaltung.fkrezept_id';

    /**
     * the column name for the fknotiz_id field
     */
    const COL_FKNOTIZ_ID = 'rezeptverwaltung.fknotiz_id';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'rezeptverwaltung.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'rezeptverwaltung.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('FkrezeptId', 'FknotizId', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('fkrezeptId', 'fknotizId', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(RezeptverwaltungTableMap::COL_FKREZEPT_ID, RezeptverwaltungTableMap::COL_FKNOTIZ_ID, RezeptverwaltungTableMap::COL_CREATED_AT, RezeptverwaltungTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('fkrezept_id', 'fknotiz_id', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FkrezeptId' => 0, 'FknotizId' => 1, 'CreatedAt' => 2, 'UpdatedAt' => 3, ),
        self::TYPE_CAMELNAME     => array('fkrezeptId' => 0, 'fknotizId' => 1, 'createdAt' => 2, 'updatedAt' => 3, ),
        self::TYPE_COLNAME       => array(RezeptverwaltungTableMap::COL_FKREZEPT_ID => 0, RezeptverwaltungTableMap::COL_FKNOTIZ_ID => 1, RezeptverwaltungTableMap::COL_CREATED_AT => 2, RezeptverwaltungTableMap::COL_UPDATED_AT => 3, ),
        self::TYPE_FIELDNAME     => array('fkrezept_id' => 0, 'fknotiz_id' => 1, 'created_at' => 2, 'updated_at' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('rezeptverwaltung');
        $this->setPhpName('Rezeptverwaltung');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Rezeptverwaltung');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignKey('fkrezept_id', 'FkrezeptId', 'INTEGER', 'rezept', 'rezept_id', true, null, null);
        $this->addForeignKey('fknotiz_id', 'FknotizId', 'INTEGER', 'notiz', 'notiz_id', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Notiz', '\\Notiz', RelationMap::MANY_TO_ONE, array('fknotiz_id' => 'notiz_id', ), null, null);
        $this->addRelation('Rezept', '\\Rezept', RelationMap::MANY_TO_ONE, array('fkrezept_id' => 'rezept_id', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return null;
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return '';
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RezeptverwaltungTableMap::CLASS_DEFAULT : RezeptverwaltungTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Rezeptverwaltung object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RezeptverwaltungTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RezeptverwaltungTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RezeptverwaltungTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RezeptverwaltungTableMap::OM_CLASS;
            /** @var Rezeptverwaltung $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RezeptverwaltungTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RezeptverwaltungTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RezeptverwaltungTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Rezeptverwaltung $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RezeptverwaltungTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RezeptverwaltungTableMap::COL_FKREZEPT_ID);
            $criteria->addSelectColumn(RezeptverwaltungTableMap::COL_FKNOTIZ_ID);
            $criteria->addSelectColumn(RezeptverwaltungTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(RezeptverwaltungTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.fkrezept_id');
            $criteria->addSelectColumn($alias . '.fknotiz_id');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RezeptverwaltungTableMap::DATABASE_NAME)->getTable(RezeptverwaltungTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RezeptverwaltungTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RezeptverwaltungTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RezeptverwaltungTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Rezeptverwaltung or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Rezeptverwaltung object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RezeptverwaltungTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Rezeptverwaltung) { // it's a model object
            // create criteria based on pk value
            $criteria = $values->buildCriteria();
        } else { // it's a primary key, or an array of pks
            throw new LogicException('The Rezeptverwaltung object has no primary key');
        }

        $query = RezeptverwaltungQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RezeptverwaltungTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RezeptverwaltungTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the rezeptverwaltung table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RezeptverwaltungQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Rezeptverwaltung or Criteria object.
     *
     * @param mixed               $criteria Criteria or Rezeptverwaltung object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RezeptverwaltungTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Rezeptverwaltung object
        }


        // Set the correct dbName
        $query = RezeptverwaltungQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RezeptverwaltungTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RezeptverwaltungTableMap::buildTableMap();
