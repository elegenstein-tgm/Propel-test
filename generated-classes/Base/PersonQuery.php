<?php

namespace Base;

use \Person as ChildPerson;
use \PersonQuery as ChildPersonQuery;
use \Exception;
use \PDO;
use Map\PersonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'person' table.
 *
 *
 *
 * @method     ChildPersonQuery orderByPersonname($order = Criteria::ASC) Order by the personName column
 * @method     ChildPersonQuery orderByBeschreibung($order = Criteria::ASC) Order by the beschreibung column
 * @method     ChildPersonQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method     ChildPersonQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildPersonQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildPersonQuery groupByPersonname() Group by the personName column
 * @method     ChildPersonQuery groupByBeschreibung() Group by the beschreibung column
 * @method     ChildPersonQuery groupByPersonId() Group by the person_id column
 * @method     ChildPersonQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildPersonQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildPersonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersonQuery leftJoinnotizen($relationAlias = null) Adds a LEFT JOIN clause to the query using the notizen relation
 * @method     ChildPersonQuery rightJoinnotizen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the notizen relation
 * @method     ChildPersonQuery innerJoinnotizen($relationAlias = null) Adds a INNER JOIN clause to the query using the notizen relation
 *
 * @method     ChildPersonQuery leftJoinnotizen($relationAlias = null) Adds a LEFT JOIN clause to the query using the notizen relation
 * @method     ChildPersonQuery rightJoinnotizen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the notizen relation
 * @method     ChildPersonQuery innerJoinnotizen($relationAlias = null) Adds a INNER JOIN clause to the query using the notizen relation
 *
 * @method     \NotizQuery|\TeilnehmenQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPerson findOne(ConnectionInterface $con = null) Return the first ChildPerson matching the query
 * @method     ChildPerson findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPerson matching the query, or a new ChildPerson object populated from the query conditions when no match is found
 *
 * @method     ChildPerson findOneByPersonname(string $personName) Return the first ChildPerson filtered by the personName column
 * @method     ChildPerson findOneByBeschreibung(string $beschreibung) Return the first ChildPerson filtered by the beschreibung column
 * @method     ChildPerson findOneByPersonId(int $person_id) Return the first ChildPerson filtered by the person_id column
 * @method     ChildPerson findOneByCreatedAt(string $created_at) Return the first ChildPerson filtered by the created_at column
 * @method     ChildPerson findOneByUpdatedAt(string $updated_at) Return the first ChildPerson filtered by the updated_at column
 *
 * @method     ChildPerson[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPerson objects based on current ModelCriteria
 * @method     ChildPerson[]|ObjectCollection findByPersonname(string $personName) Return ChildPerson objects filtered by the personName column
 * @method     ChildPerson[]|ObjectCollection findByBeschreibung(string $beschreibung) Return ChildPerson objects filtered by the beschreibung column
 * @method     ChildPerson[]|ObjectCollection findByPersonId(int $person_id) Return ChildPerson objects filtered by the person_id column
 * @method     ChildPerson[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPerson objects filtered by the created_at column
 * @method     ChildPerson[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildPerson objects filtered by the updated_at column
 * @method     ChildPerson[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersonQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\PersonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notizen', $modelName = '\\Person', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersonQuery) {
            return $criteria;
        }
        $query = new ChildPersonQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPerson|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPerson A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT personName, beschreibung, person_id, created_at, updated_at FROM person WHERE person_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPerson $obj */
            $obj = new ChildPerson();
            $obj->hydrate($row);
            PersonTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPerson|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the personName column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonname('fooValue');   // WHERE personName = 'fooValue'
     * $query->filterByPersonname('%fooValue%'); // WHERE personName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $personname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByPersonname($personname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($personname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $personname)) {
                $personname = str_replace('*', '%', $personname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonTableMap::COL_PERSONNAME, $personname, $comparison);
    }

    /**
     * Filter the query on the beschreibung column
     *
     * Example usage:
     * <code>
     * $query->filterByBeschreibung('fooValue');   // WHERE beschreibung = 'fooValue'
     * $query->filterByBeschreibung('%fooValue%'); // WHERE beschreibung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beschreibung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByBeschreibung($beschreibung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beschreibung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $beschreibung)) {
                $beschreibung = str_replace('*', '%', $beschreibung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonTableMap::COL_BESCHREIBUNG, $beschreibung, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id > 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PersonTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PersonTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(PersonTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(PersonTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Notiz object
     *
     * @param \Notiz|ObjectCollection $notiz  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonQuery The current query, for fluid interface
     */
    public function filterBynotizen($notiz, $comparison = null)
    {
        if ($notiz instanceof \Notiz) {
            return $this
                ->addUsingAlias(PersonTableMap::COL_PERSON_ID, $notiz->getFkId(), $comparison);
        } elseif ($notiz instanceof ObjectCollection) {
            return $this
                ->usenotizenQuery()
                ->filterByPrimaryKeys($notiz->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBynotizen() only accepts arguments of type \Notiz or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the notizen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function joinnotizen($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('notizen');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'notizen');
        }

        return $this;
    }

    /**
     * Use the notizen relation Notiz object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \NotizQuery A secondary query class using the current class as primary query
     */
    public function usenotizenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinnotizen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'notizen', '\NotizQuery');
    }

    /**
     * Filter the query by a related \Teilnehmen object
     *
     * @param \Teilnehmen|ObjectCollection $teilnehmen  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonQuery The current query, for fluid interface
     */
    public function filterBynotizen($teilnehmen, $comparison = null)
    {
        if ($teilnehmen instanceof \Teilnehmen) {
            return $this
                ->addUsingAlias(PersonTableMap::COL_PERSON_ID, $teilnehmen->getPid(), $comparison);
        } elseif ($teilnehmen instanceof ObjectCollection) {
            return $this
                ->usenotizenQuery()
                ->filterByPrimaryKeys($teilnehmen->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBynotizen() only accepts arguments of type \Teilnehmen or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the notizen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function joinnotizen($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('notizen');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'notizen');
        }

        return $this;
    }

    /**
     * Use the notizen relation Teilnehmen object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TeilnehmenQuery A secondary query class using the current class as primary query
     */
    public function usenotizenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinnotizen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'notizen', '\TeilnehmenQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPerson $person Object to remove from the list of results
     *
     * @return $this|ChildPersonQuery The current query, for fluid interface
     */
    public function prune($person = null)
    {
        if ($person) {
            $this->addUsingAlias(PersonTableMap::COL_PERSON_ID, $person->getPersonId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the person table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonTableMap::clearInstancePool();
            PersonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(PersonTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(PersonTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(PersonTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(PersonTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(PersonTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildPersonQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(PersonTableMap::COL_CREATED_AT);
    }

} // PersonQuery
