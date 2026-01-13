<?php

namespace App\Services;

use App\Database\Database;

class DbQuery extends Database
{
    /**
     * @var string The SQL query string.
     */
    public $query;

    /**
     * @var mixed Stores result of find() used for ID checking.
     */
    public $checkId;

    /**
     * @var \PDOStatement PDO Statement object.
     */
    public $runQuery;

    /**
     * @var int Number of rows returned.
     */
    public $rowsCount;

    /**
     * @var array Stores formatted query results and metadata.
     */
    public $result = [];

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all rows from a database table.
     *
     * @param string $tableName The table name.
     * @return array Returns an array containing:
     *               - rowCount (int): number of rows found
     *               - query (\PDOStatement): query result object
     *               - rows (array): the actual data
     */
    public function all($tableName, $limit = null, $page = 1)
    {
        if ($limit !== null) {
            return $this->paginate($tableName, $limit, $page);
        }

        $this->query = "SELECT * FROM `$tableName`";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute();

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['rows'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Fetch paginated rows from a database table.
     *
     * @param string $tableName The table name.
     * @param int $limit Number of rows per page.
     * @param int $page Current page number.
     * @return array Returns an array containing:
     *               - rowCount (int): number of rows in this page
     *               - totalRows (int): total number of rows in table
     *               - totalPages (int): total number of pages
     *               - currentPage (int): current page number
     *               - rows (array): the actual data objects
     */
    public function paginate($tableName, $limit = 10, $page = 1)
    {
        // Get total rows count
        $countQuery = "SELECT COUNT(*) as total FROM `$tableName`";
        $stmtCount = $this->returnConnect()->prepare($countQuery);
        $stmtCount->execute();
        $totalRows = $stmtCount->fetch(\PDO::FETCH_OBJ)->total;

        // Calculate offset
        $offset = ($page - 1) * $limit;
        $totalPages = ceil($totalRows / $limit);

        // Fetch data
        $this->query = "SELECT * FROM `$tableName` LIMIT $limit OFFSET $offset";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute();

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['totalRows'] = $totalRows;
        $this->result['totalPages'] = $totalPages;
        $this->result['currentPage'] = $page;
        $this->result['query'] = $this->runQuery;
        $this->result['rows'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Find a single row by ID.
     *
     * @param string $tableName The table name.
     * @param int $id The row ID.
     * @return array Returns:
     *               - rowCount (int)
     *               - query (\PDOStatement)
     *               - row (array|false)
     */
    public function find($tableName, $id)
    {
        $this->query = "SELECT * FROM `$tableName` WHERE `id` = ?";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute([$id]);

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['row'] = $stmt->fetch(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Find a single row by Slug.
     *
     * @param string $tableName The table name.
     * @param string $slug The row slug.
     * @return array Returns:
     *               - rowCount (int)
     *               - query (\PDOStatement)
     *               - row (array|false)
     */
    public function findBySlug($tableName, $slug)
    {
        $this->query = "SELECT * FROM `$tableName` WHERE `slug` = ?";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute([$slug]);

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['row'] = $stmt->fetch(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Fetch the latest row from a table.
     *
     * @param string $tableName The table name.
     * @param string $column The column to order by (default: 'id').
     * @return array Returns:
     *               - rowCount (int)
     *               - query (\PDOStatement)
     *               - row (array|false)
     */
    public function latest($tableName, $column = 'id')
    {
        $this->query = "SELECT * FROM `$tableName` ORDER BY `$column` DESC LIMIT 1";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute();

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['row'] = $stmt->fetch(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Delete a row by ID.
     *
     * @param string $tableName The table name.
     * @param int $id Row ID to delete.
     * @return string Returns a status message.
     */
    public function delete($tableName, $id)
    {
        $this->checkId = $this->find($tableName, $id);

        if ($this->checkId['rowCount'] > 0) {
            $this->query = "DELETE FROM `$tableName` WHERE `id` = ?";
            $stmt = $this->returnConnect()->prepare($this->query);
            $stmt->execute([$id]);
            return 'data deleted';
        } else {
            return 'Id not found';
        }
    }

    /**
     * Insert a new row into a table.
     *
     * @param string $tableName The table name.
     * @param array $data Key-value pairs (column => value)
     * @return string 'data inserted' or 'insert failed'
     */
    public function insert($tableName, array $data)
    {
        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $columnString = implode(', ', array_map(fn($c) => "`$c`", $columns));
        $placeholderString = implode(', ', $placeholders);

        $this->query = "INSERT INTO `$tableName` ($columnString) VALUES ($placeholderString)";

        $stmt = $this->returnConnect()->prepare($this->query);
        $success = $stmt->execute(array_values($data));

        $this->runQuery = $stmt;

        return $success ? "data inserted" : "insert failed";
    }

    /**
     * Update a row by ID.
     *
     * @param string $tableName The table name.
     * @param int $id The row ID.
     * @param array $data Columns to update (column => value)
     * @return string Returns status.
     */
    public function update($tableName, $id, array $data)
    {
        // Check if ID exists
        $this->checkId = $this->find($tableName, $id);

        if ($this->checkId['rowCount'] < 1) {
            return "Id not found";
        }

        $columns = array_keys($data);
        $setParts = array_map(fn($c) => "`$c` = ?", $columns);
        $setString = implode(', ', $setParts);

        $this->query = "UPDATE `$tableName` SET $setString WHERE `id` = ?";

        $values = array_values($data);
        $values[] = $id;

        $stmt = $this->returnConnect()->prepare($this->query);
        $success = $stmt->execute($values);

        $this->runQuery = $stmt;

        return $success ? "data updated" : "update failed";
    }
    
    /**
     * Fetch rows based on a dynamic column and value.
     *
     * @param string $tableName The table name.
     * @param string $column The column name.
     * @param mixed $value The value to search for.
     * @return array Returns:
     *               - rowCount (int)
     *               - query (\PDOStatement)
     *               - rows (array)
     */
    public function where($tableName, $column, $value)
    {
        $this->query = "SELECT * FROM `$tableName` WHERE `$column` = ?";
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute([$value]);

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['rows'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $this->result;
    }

    /**
     * Fetch rows with dynamic joins.
     *
     * @param string $tableName The main table name.
     * @param string|array $columns Columns to select (e.g., "users.id, posts.title" or ["users.id", "posts.title"]).
     * @param array $joins Array of join definitions.
     *                     Each join can be:
     *                     - ['table' => 'other', 'on' => 't1.id = t2.id', 'type' => 'LEFT']
     *                     - ['other', 't1.id = t2.id', 'LEFT']
     * @param string|null $where Optional WHERE clause (e.g., "users.status = 1").
     * @param string|null $orderBy Optional ORDER BY clause (e.g., "users.created_at DESC").
     * @param int|null $limit Optional LIMIT.
     * @return array Returns standard result structure.
     */
    public function join($tableName, $columns, array $joins, $where = null, $orderBy = null, $limit = null)
    {
        // 1. Build SELECT columns
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }
        
        $sql = "SELECT $columns FROM `$tableName`";

        // 2. Build JOINs
        foreach ($joins as $join) {
            // Normalize join array
            if (isset($join['table'])) {
                $joinTable = $join['table'];
                $joinOn = $join['on'];
                $joinType = $join['type'] ?? 'INNER';
            } else {
                // Handle simplified array: [0 => table, 1 => on, 2 => type]
                $joinTable = $join[0];
                $joinOn = $join[1];
                $joinType = $join[2] ?? 'INNER';
            }

            // Validate join type
            $joinType = strtoupper($joinType);
            if (!in_array($joinType, ['INNER', 'LEFT', 'RIGHT', 'FULL', 'CROSS'])) {
                $joinType = 'INNER';
            }

            $sql .= " $joinType JOIN `$joinTable` ON $joinOn";
        }

        // 3. Build WHERE
        if ($where) {
            $sql .= " WHERE $where";
        }

        // 4. Build ORDER BY
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
        }

        // 5. Build LIMIT
        if ($limit) {
            $sql .= " LIMIT $limit";
        }

        $this->query = $sql;
        $stmt = $this->returnConnect()->prepare($this->query);
        $stmt->execute();

        $this->runQuery = $stmt;
        $this->rowsCount = $stmt->rowCount();

        $this->result['rowCount'] = $this->rowsCount;
        $this->result['query'] = $this->runQuery;
        $this->result['rows'] = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $this->result;
    }

}