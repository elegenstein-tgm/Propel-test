<?php

namespace Base;

use \Notiz as ChildNotiz;
use \NotizQuery as ChildNotizQuery;
use \Exception;
use \PDO;
use Map\NotizTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'notiz' table.
 *
 *
 *
 * @method     ChildNotizQuery orderByBetreff($order = Criteria::ASC) Order by the betreff column
 * @method     ChildNotizQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildNotizQuery orderByDatum($order = Criteria::ASC) Order by the datum column
 * @method     ChildNotizQuery orderByBesitzer($order = Criteria::ASC) Order by the besitzer column
 * @method     ChildNotizQuery orderByProjekt($order = Criteria::ASC) Order by the projekt column
 * @method     ChildNotizQuery orderByNotizId($order = Criteria::ASC) Order by the notiz_id column
 * @method     ChildNotizQuery orderByFkId($order = Criteria::ASC) Order by the fk_id column
 * @method     ChildNotizQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildNotizQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildNotizQuery groupByBetreff() Group by the betreff column
 * @method     ChildNotizQuery groupByText() Group by the text column
 * @method     ChildNotizQuery groupByDatum() Group by the datum column
 * @method     ChildNotizQuery groupByBesitzer() Group by the besitzer column
 * @method     ChildNotizQuery groupByProjekt() Group by the projekt column
 * @method     ChildNotizQuery groupByNotizId() Group by the notiz_id column
 * @method     ChildNotizQuery groupByFkId() Group by the fk_id column
 * @method     ChildNotizQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildNotizQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildNotizQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNotizQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNotizQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNotizQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method     ChildNotizQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method     ChildNotizQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method     ChildNotizQuery leftJoinnotizen($relationAlias = null) Adds a LEFT JOIN clause to the query using the notizen relation
 * @method     ChildNotizQuery rightJoinnotizen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the notizen relation
 * @method     ChildNotizQuery innerJoinnotizen($relationAlias = null) Adds a INNER JOIN clause to the query using the notizen relation
 *
 * @method     ChildNotizQuery leftJoinnotizen($relationAlias = null) Adds a LEFT JOIN clause to the query using the notizen relation
 * @method     ChildNotizQuery rightJoinnotizen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the notizen relation
 * @method     ChildNotizQuery innerJoinnotizen($relationAlias = null) Adds a INNER JOIN clause to the query using the notizen relation
 *
 * @method     \PersonQuery|\RezeptverwaltungQuery|\ToDoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildNotiz findOne(ConnectionInterface $con = null) Return the first ChildNotiz matching the query
 * @method     ChildNotiz findOneOrCreate(ConnectionInterface $con = null) Return the first ChildNotiz matching the query, or a new ChildNotiz object populated from the query conditions when no match is found
 *
 * @method     ChildNotiz findOneByBetreff(string $betreff) Return the first ChildNotiz filtered by the betreff column
 * @method     ChildNotiz findOneByText(string $text) Return the first ChildNotiz filtered by the text column
 * @method     ChildNotiz findOneByDatum(string $datum) Return the first ChildNotiz filtered by the datum column
 * @method     ChildNotiz findOneByBesitzer(string $besitzer) Return the first ChildNotiz filtered by the besitzer column
 * @method     ChildNotiz findOneByProjekt(string $projekt) Return the first ChildNotiz filtered by the projekt column
 * @method     ChildNotiz findOneByNotizId(int $notiz_id) Return the first ChildNotiz filtered by the notiz_id column
 * @method     ChildNotiz findOneByFkId(int $fk_id) Return the first ChildNotiz filtered by the fk_id column
 * @method     ChildNotiz findOneByCreatedAt(string $created_at) Return the first ChildNotiz filtered by the created_at column
 * @method     ChildNotiz findOneByUpdatedAt(string $updated_at) Return the first ChildNotiz filtered by the updated_at column
 *
 * @method     ChildNotiz[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildNotiz objects based on current ModelCriteria
 * @method     ChildNotiz[]|ObjectCollection findByBetreff(string $betreff) Return ChildNotiz objects filtered by the betreff column
 * @method     ChildNotiz[]|ObjectCollection findByText(string $text) Return ChildNotiz objects filtered by the text column
 * @method     ChildNotiz[]|ObjectCollection findByDatum(string $datum) Return ChildNotiz objects filtered by the datum column
 * @method     ChildNotiz[]|ObjectCollection findByBesitzer(string $besitzer) Return ChildNotiz objects filtered by the besitzer column
 * @method     ChildNotiz[]|ObjectCollection findByProjekt(string $projekt) Return ChildNotiz objects filtered by the projekt column
 * @method     ChildNotiz[]|ObjectCollection findByNotizId(int $notiz_id) Return ChildNotiz objects filtered by the notiz_id column
 * @method     ChildNotiz[]|ObjectCollection findByFkId(int $fk_id) Return ChildNotiz objects filtered by the fk_id column
 * @method     ChildNotiz[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildNotiz objects filtered by the created_at column
 * @method     ChildNotiz[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildNotiz objects filtered by the updated_at column
 * @method     ChildNotiz[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class NotizQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\NotizQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'notizen', $modelName = '\\Notiz', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNotizQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNotizQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildNotizQuery) {
            return $criteria;
        }
        $query = new ChildNotizQuery();
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
     * @return ChildNotiz|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NotizTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NotizTableMap::DATABASE_NAME);
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
     * @return ChildNotiz A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT betreff, text, datum, besitzer, projekt, notiz_id, fk_id, created_at, updated_at FROM notiz WHERE notiz_id = :p0';
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
            /** @var ChildNotiz $obj */
            $obj = new ChildNotiz();
            $obj->hydrate($row);
            NotizTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildNotiz|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the betreff column
     *
     * Example usage:
     * <code>
     * $query->filterByBetreff('fooValue');   // WHERE betreff = 'fooValue'
     * $query->filterByBetreff('%fooValue%'); // WHERE betreff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $betreff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByBetreff($betreff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($betreff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $betreff)) {
                $betreff = str_replace('*', '%', $betreff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_BETREFF, $betreff, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the datum column
     *
     * Example usage:
     * <code>
     * $query->filterByDatum('2011-03-14'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum('now'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum(array('max' => 'yesterday')); // WHERE datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $datum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByDatum($datum = null, $comparison = null)
    {
        if (is_array($datum)) {
            $useMinMax = false;
            if (isset($datum['min'])) {
                $this->addUsingAlias(NotizTableMap::COL_DATUM, $datum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datum['max'])) {
                $this->addUsingAlias(NotizTableMap::COL_DATUM, $datum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_DATUM, $datum, $comparison);
    }

    /**
     * Filter the query on the besitzer column
     *
     * Example usage:
     * <code>
     * $query->filterByBesitzer('fooValue');   // WHERE besitzer = 'fooValue'
     * $query->filterByBesitzer('%fooValue%'); // WHERE besitzer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $besitzer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByBesitzer($besitzer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($besitzer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $besitzer)) {
                $besitzer = str_replace('*', '%', $besitzer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_BESITZER, $besitzer, $comparison);
    }

    /**
     * Filter the query on the projekt column
     *
     * Example usage:
     * <code>
     * $query->filterByProjekt('fooValue');   // WHERE projekt = 'fooValue'
     * $query->filterByProjekt('%fooValue%'); // WHERE projekt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $projekt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByProjekt($projekt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($projekt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $projekt)) {
                $projekt = str_replace('*', '%', $projekt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_PROJEKT, $projekt, $comparison);
    }

    /**
     * Filter the query on the notiz_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNotizId(1234); // WHERE notiz_id = 1234
     * $query->filterByNotizId(array(12, 34)); // WHERE notiz_id IN (12, 34)
     * $query->filterByNotizId(array('min' => 12)); // WHERE notiz_id > 12
     * </code>
     *
     * @param     mixed $notizId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByNotizId($notizId = null, $comparison = null)
    {
        if (is_array($notizId)) {
            $useMinMax = false;
            if (isset($notizId['min'])) {
                $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $notizId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($notizId['max'])) {
                $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $notizId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $notizId, $comparison);
    }

    /**
     * Filter the query on the fk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFkId(1234); // WHERE fk_id = 1234
     * $query->filterByFkId(array(12, 34)); // WHERE fk_id IN (12, 34)
     * $query->filterByFkId(array('min' => 12)); // WHERE fk_id > 12
     * </code>
     *
     * @see       filterByPerson()
     *
     * @param     mixed $fkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByFkId($fkId = null, $comparison = null)
    {
        if (is_array($fkId)) {
            $useMinMax = false;
            if (isset($fkId['min'])) {
                $this->addUsingAlias(NotizTableMap::COL_FK_ID, $fkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkId['max'])) {
                $this->addUsingAlias(NotizTableMap::COL_FK_ID, $fkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_FK_ID, $fkId, $comparison);
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
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(NotizTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(NotizTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(NotizTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(NotizTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotizTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Person object
     *
     * @param \Person|ObjectCollection $person The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNotizQuery The current query, for fluid interface
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof \Person) {
            return $this
                ->addUsingAlias(NotizTableMap::COL_FK_ID, $person->getPersonId(), $comparison);
        } elseif ($person instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NotizTableMap::COL_FK_ID, $person->toKeyValue('PrimaryKey', 'PersonId'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type \Person or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', '\PersonQuery');
    }

    /**
     * Filter the query by a related \Rezeptverwaltung object
     *
     * @param \Rezeptverwaltung|ObjectCollection $rezeptverwaltung  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildNotizQuery The current query, for fluid interface
     */
    public function filterBynotizen($rezeptverwaltung, $comparison = null)
    {
        if ($rezeptverwaltung instanceof \Rezeptverwaltung) {
            return $this
                ->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $rezeptverwaltung->getFknotizId(), $comparison);
        } elseif ($rezeptverwaltung instanceof ObjectCollection) {
            return $this
                ->usenotizenQuery()
                ->filterByPrimaryKeys($rezeptverwaltung->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBynotizen() only accepts arguments of type \Rezeptverwaltung or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the notizen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
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
     * Use the notizen relation Rezeptverwaltung object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RezeptverwaltungQuery A secondary query class using the current class as primary query
     */
    public function usenotizenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinnotizen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'notizen', '\RezeptverwaltungQuery');
    }

    /**
     * Filter the query by a related \ToDo object
     *
     * @param \ToDo|ObjectCollection $toDo  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildNotizQuery The current query, for fluid interface
     */
    public function filterBynotizen($toDo, $comparison = null)
    {
        if ($toDo instanceof \ToDo) {
            return $this
                ->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $toDo->getTodoId(), $comparison);
        } elseif ($toDo instanceof ObjectCollection) {
            return $this
                ->usenotizenQuery()
                ->filterByPrimaryKeys($toDo->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBynotizen() only accepts arguments of type \ToDo or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the notizen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
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
     * Use the notizen relation ToDo object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ToDoQuery A secondary query class using the current class as primary query
     */
    public function usenotizenQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinnotizen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'notizen', '\ToDoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildNotiz $notiz Object to remove from the list of results
     *
     * @return $this|ChildNotizQuery The current query, for fluid interface
     */
    public function prune($notiz = null)
    {
        if ($notiz) {
            $this->addUsingAlias(NotizTableMap::COL_NOTIZ_ID, $notiz->getNotizId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the notiz table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NotizTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NotizTableMap::clearInstancePool();
            NotizTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(NotizTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NotizTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NotizTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NotizTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(NotizTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(NotizTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(NotizTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(NotizTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(NotizTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildNotizQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(NotizTableMap::COL_CREATED_AT);
    }

} // NotizQuery
