<?php

class SqlsrvDatasource extends Datasource
{
	/**
	 * Guarda a conexão com o banco de dados
	 * @var	object
	 */
	protected static $connection = null;
	
	/**
	 * Guarda as instruções geradas para inserção, atualização e deleção de dados das tabelas
	 * @var	array
	 */
	protected $operations = array();
	
	/**
	 * Guarda uma instância da classe Annotation referente ao model que está sendo trabalhado
	 * @var	object
	 */
	protected $annotation;
	
	/**
	 * Guarda as propriedades do model que está sendo trabalhado
	 * @var	array
	 */
	protected $properties = array();
	
	/**
	 * Guarda o nome da classe do model
	 * @var	string
	 */
	protected $clazz;
	
	/**
	 * Guarda o nome da tabela que o model representa
	 * @var	string
	 */
	protected $table;
	
	/**
	 * Guarda o nome dos atributos que serão retornas da tabela na hora da execução das instrução SQL
	 * @var	string
	 */
	protected $select;
	
	/**
	 * Guarda os condicionais do instrução SQL
	 * @var	string
	 */
	protected $where = '';
	
	/**
	 * Guarda os valores dos condicionais
	 * @var	array
	 */
	protected $where_params = array();
	
	/**
	 * Guarda a condição de ordenação
	 * @var	string
	 */
	protected $orderby = '';
	
	/**
	 * Guarda o limite máximo de resultados que poderão ser retornados
	 * @var	int
	 */
	protected $limit = '';
	
	/**
	 * Guarda a posição em que começarão os resultados
	 * @var	int
	 */
	protected $offset = '';
	
	/**
	 * Guarda a informação se vai utilizar ou não distinção dos resultados
	 * @var	string
	 */
	protected $distinct = '';
	
	/**
	 * Guarda a cláusula GROUP BY
	 * @var	string
	 */
	protected $groupBy = '';
	
	/**
	 * Indica se o resultado a instrução é uma operão soma, média, valor mínimo e etc.
	 * @var	boolean
	 */
	protected $calc = false;
	
	/**
	 * Construtor da classe
	 * @param	string	$class		nome do model
	 * @throws	DatabaseException	dispara se o model não tiver a anotação de Entity ou View
	 */
	public function __construct($class)
	{
		$this->clazz = $class;
		$this->annotation = Annotation::get($class);
		$this->properties = $this->annotation->getProperties();
		
		$annotation_class = $this->annotation->getClass();
		if(!property_exists($annotation_class, 'Entity') && !property_exists($annotation_class, 'View'))
			throw new DatabaseException("A classe '". $class ."' não é uma entidade ou view");
			
		$this->table = isset($annotation_class->Entity) ? $annotation_class->Entity : (isset($annotation_class->View) ? $annotation_class->View : $class);
	}
	
	/**
	 * Método estático que faz a conexão com o banco de dados
	 * @throws	DatabaseException	dispara se ocorrer algum exceção do tipo PDOException
	 * @return	object				retorna uma instância da classe PDO que representa a conexão
	 */
	public function connection()
	{
		if(self::$connection !== null) 
			return self::$connection;
		try
		{
			self::$connection = new PDO('sqlsrv:server='. db_host .';Database='. db_name, db_user, db_pass);
			self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
			self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return self::$connection;
		}
		catch(PDOException $e)
		{
			throw new DatabaseException($e->getMessage());
		}
	}
	
	/**
	 * Pega as instrucões SQL geradas e limpa a propriedade $operations
	 * @return	array	retorna um array com as SQLs
	 */
	public function getAndClearOperations()
	{
		$operations = $this->operations;
		$this->operations = array();
		return $operations;
	}
	
	/**
	 * Adiciona as condições na instrunção (clausula WHERE)
	 * @param	string	$condition		condições SQL, por exemplo 'Id = ? OR slug = ?'
	 * @param	mixed	$value1			valor da primeira condição
	 * @param	mixed	$valueN			valor da x condição
	 * @throws	DatabaseException		disparado se a quantidade de argumentos for menor 2 ou se quantidade de condicionais não corresponder a quantidade de valores
	 * @return	object					retorna a própria instância da classe SqlsrvDatasource 
	 */
	public function where()
	{
		if(func_num_args() < 2)
			throw new DatabaseException('O método where() deve conter no mínimo 2 parâmetros');
		
		$args = func_get_args();
		$where = $args[0];
		array_shift($args);
		$params = $args;
		
		if(substr_count($where, '?') !== count($params))
			throw new DatabaseException('Quantidade de parâmetros está diferente');
			
		$this->where = $where;
		$this->where_params = $params;
		return $this;
	}
	
	/**
	 * Adiciona as condições na instrução (clausula WHERE)
	 * @param	string	$where		condições SQL, por exemplo 'Id = ? OR slug = ?'
	 * @param	array	$params		array com os valores das condições
	 * @return	object				retorna a própria instância da classe SqlsrvDatasource
	 */
	public function whereArray($where, $params)
	{
		if(substr_count($where, '?') !== count($params))
			throw new DatabaseException('Quantidade de parâmetros está diferente');
		
		$this->where = $where;
		$this->where_params = $params;
		return $this;
	}
	
	/**
	 * Adiciona as condições na instrução SQL (clausula WHERE)
	 * @param	string	$where		condições SQL com valores direto, por exemplo 'Description IS NOT NULL'
	 * @return	object				retorna a própria instância da classe SqlsrvDatasource
	 */
	public function whereSQL($where)
	{
		$this->where = $where;
		return $this;
	}
	
	/**
	 * Define a ordem em que os resultados serão retornados
	 * @param	string	$order	nome da coluna a ser ordenada
	 * @param	string	$type	typo de ordenação (asc ou desc)
	 * @return	object			retorna a própria instância da classe SqlsrvDatasource
	 */
	public function orderBy($order, $type = null)
	{
		$this->orderby = $order . ($type ? ' '. $type : '');
		return $this;
	}
	
	/**
	 * Define como ordem decrescente os resultados que serão retornados
	 * @param	string	$order	nome da coluna a ser ordenada
	 * @return	object			retorna a própria instância da classe SqlsrvDatasource
	 */
	public function orderByDesc($order)
	{
		$this->orderby = $order .' DESC';
		return $this;
	}
	
	/**
	 * Define um limite máximo de itens a serem retornados
	 * @param	int	$n	valor do limite
	 * @param	int	$o	valor do offset
	 * @return	object	retorna a própria instância da classe SqlsrvDatasource
	 */
	public function limit($n, $o = null)
	{
		$this->limit = $n;
		if($o !== null) 
			$this->offset = $o;
		return $this;
	}
	
	/**
	 * Define a posição em que os resultados iniciam
	 * @param	int	$n	valor da posição
	 * @return	object	retorna a própria instância da classe SqlsrvDatasource
	 */
	public function offset($n)
	{
		$this->offset = $n;
		return $this;
	}
	
	/**
	 * Define que os resultados serão distintos
	 * @return	object	retorna a própria instância da classe SqlsrvDatasource
	 */
	public function distinct()
	{
		$this->distinct = 'DISTINCT ';
		return $this;
	}
	
	/**
	 * Agrupa por colunas (cláusula GROUP BY)
	 * @param	mixed	$value1			nome de uma coluna
	 * @param	mixed	$valueN			nome da x coluna
	 * @throws	DatabaseException		disparado se a quantidade de argumentos for menor 1
	 * @return	object					retorna a própria instância da classe MysqlDatasource 
	 */
	public function groupBy()
	{
		if(func_num_args() < 1)
			throw new DatabaseException('O método groupBy() deve conter no mínimo 1 parâmetro');
		
		$params = func_get_args();
			
		$this->groupBy = $params;
		return $this;
	}
	
	/**
	 * Gerar e retorna o SQL da consulta
	 * @return	string	retorna o SQL gerado
	 */
	public function getSQL()
	{
		$select = $this->select;
		if(!$select)
			$select = $this->table .'.*';
		
		$joins = '';
		//joins
		
		$where = $this->where ? ' WHERE '. $this->where : '';
		$orderby = $this->orderby ? ' ORDER BY '. $this->orderby : '';
		$groupby = $this->groupBy ? ' GROUP BY ['. implode('], [', $this->groupBy) .']' : '';
		
		if($this->limit != null)
		{
			if(!$orderby)
				$orderby = ' ORDER BY NEWID()';
			$sql = 'SELECT * FROM (SELECT ROW_NUMBER() OVER ('. $orderby .') AS RowNumberOfPagination, '. $this->distinct . $select .' FROM '. $this->table . $joins . $where . $groupby .') AS TablePaginated WHERE RowNumberOfPagination BETWEEN '. $this->offset .' AND '. ($this->offset + $this->limit);
		}
		else
		{
			$sql = 'SELECT '. $this->distinct . $select .' FROM '. $this->table . $joins . $where . $groupby . $orderby;
		}
		
		return $sql;
	}
	
	/**
	 * Monta a instrunção SQL a partir da operações chamadas e executa a instrução
	 * @throws	TriladoException	disparada caso ocorra algum erro na execução da operação
	 * @return	array				retorna um array com instâncias do Model
	 */
	public function all()
	{
		if (func_num_args() > 0) 
		{
			$reflectionMethod = new ReflectionMethod('SqlsrvDatasource', 'where');
			$args = func_get_args();
			$reflectionMethod->invokeArgs($this, $args);
		}
		
		$sql = $this->getSQL();

		Debug::addSql($sql, $this->where_params);
		
		$stmt = $this->connection()->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$status = $stmt->execute($this->where_params);
		if(!$status)
		{
			$error = $stmt->errorInfo();
			throw new TriladoException($error[2]);
		}
		if($stmt->rowCount() > 0)
		{
			$results = array();
			$annotation = Annotation::get($this->clazz);
			$i = 0;
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				if($this->calc)
					return $result['calc'];
				$model = $this->clazz;
				$object = new $model();	
				$object->_setNew();	
				
				foreach($result as $field => $value)
				{
					$property = $annotation->getProperty($field);
					$type = strtolower($property->Column->Type);
					
					if($type === 'double')
						$type = 'float';
					elseif($type === 'int')
						$type = 'integer';
					elseif($type === 'boolean')
						$value = ord($value) == 1;
					elseif($type !== 'datetime')
						settype($value, $type);
					$object->{$field} = $value;
				}
				
				$results[$i] = $object;
				++$i;
			}
			return $results;
		}
		return array();
	}
	
	/**
	 * Monta a instrução SQL a partir das operações chamadas e executa a instrução
	 * @return	object	retorna uma instância do Model com os valores preenchidos de acordo com o banco
	 */
	public function single()
	{
		$this->limit(1, 0);
		
		$reflectionMethod = new ReflectionMethod('SqlsrvDatasource', 'all');
		$args = func_get_args();
		$result = $reflectionMethod->invokeArgs($this, $args);
		
		if(count($result)) 
			return $result[0];
	}
	
	/**
	 * Monta a instrução SQL com paginação de resultado, executa a instrução
	 * @param	int	$p		o número da página que quer listar os resultados (começa com zero)
	 * @param	int	$m		quantidade máxima de itens por página
	 * @return	object		retorna um objeto com as propriedade Data (contendo um array com os resultados) e Count (contento a quantidade total de resultados)
	 */
	public function paginate($p, $m)
	{
		$p = ($p < 0 ? 0 : $p) * $m;
		$result = new stdClass;
		$this->limit = $m;
		$this->offset = $p;
		$result->Data = $this->all();
		$this->limit = null;
		$this->offset = null;
		$this->orderby = null;
	
		$result->Count = $this->count();
		return $result;
	}
	
	/**
	 * Monta a instrução SQL a partir das operações chamadas e executa a instrução
	 * @param	string	$operation		operação a ser executada, tipo SUM, AVG, MIN e etc
	 * @param	string	$column			colunas da tabela em que a operação se aplica
	 * @return 	int						retorna o valor da operação 
	 */
	protected function calc($operation, $column)
	{
		$this->calc = true;
		$this->select = $operation .'('. $column .') AS calc';
		return $this->all();
	}
	
	/**
	 * Calcula quantos resultados existem na tabela aplicando as regras dos métodos chamados anteriormente
	 * @param	string	$column		coluna a ser verifica a quantidade
	 * @return	int		retorna a quantidade
	 */
	public function count($column = null)
	{
		if(!$column)
			$column = '*';
		return $this->calc('COUNT', $this->table .'.'. $column);
	}
	
	/**
	 * Calcula a soma de todos os valores da coluna expecificada
	 * @param	string	$column		coluna a ser somada
	 * @return	double				retorna a soma dos valores de cada linha
	 */
	public function sum($column)
	{
		return $this->calc('SUM', $this->table .'.'. $column);
	}
	
	/**
	 * Calcula o maior valor de uma coluna expecifica
	 * @param	string	$column		nome da coluna a ser calculada
	 * @return	double				retorna o maior valor	
	 */
	public function max($column)
	{
		return $this->calc('MAX', $this->table .'.'. $column);
	}
	
	/**
	 * Calcula o menor valor de uma coluna expecifica
	 * @param	string	$column		nome da coluna a ser calculada
	 * @return	double				retorna o menor valor
	 */
	public function min($column)
	{
		return $this->calc('MIN', $this->table .'.'. $column);
	}
	
	/**
	 * Calcula a média de uma coluna expecifica, somando todos os valores dessa coluna e divindo pela quantidade de linhas existentes
	 * @param	string	$column		nome da coluna a ser calculada
	 * @return	double				retorna a média calculada
	 */
	public function avg($column)
	{
		return $this->calc('AVG', $this->table .'.'. $column);
	}
	
	/**
	 * Verifica se o model possui algum relacionamento com outro model
	 * @return	array	retorna null caso não possua, mas se possuir retorna os relacionamentos
	 */
	protected function isRelated()
	{
		$relationships = array();
		foreach($this->properties as $name => $property)
		{
			if($this->isField($property) && $property->Foreign)
				$relationships[$name] = $property->Foreign;
		}
		return count($relationships) ? $relationships : null;
	}
	
	/**
	 * Verifica se uma propriedade expecifica do model representa uma coluna na tabela
	 * @param	object	$property	annotation da propriedade
	 * @return	boolean				retorna true se for uma coluna ou false caso contrario
	 */
	protected function isField($property)
	{
		return count((array)$property) > 0;
	}
	
	/**
	 * Valida uma propriedade expecifica do model
	 * @param	object	$property			anotação da propriedade
	 * @param	string	$field				nome da propriedade	
	 * @param	mixed	$value				valor da propriedade
	 * @throws	ValidationException			disparada caso o valor seja inválido
	 * @return	void
	 */
	protected function validate($property, $field, $value)
	{
		$label = isset($property->Label) ? $property->Label : $field;
		$functions = array('Int' => 'is_int', 'String' => 'is_string', 'Double' => 'is_double', 'Boolean' => 'is_bool');
		$is_type = $functions[$property->Column->Type];
		
		$value = $this->defaultValue($property->Column->Type, $value);
		
		if ($value == null && $property->AutoGenerated)
			return true;
		if(is_object($value))
			throw new ValidationException("O valor de '{$label}' não pode ser um objeto", 90400);
		if(isset($property->Required) && ($value === '' || $value === null)) 
			throw new ValidationException("O campo '{$label}' é obrigatório", 90401);
		if($is_type && !$is_type($value))
			throw new ValidationException("O campo '{$label}' só aceita valor do tipo '{$property->Column->Type}'", 90402);
		if(isset($property->Regex) && !preg_match('#'. $property->Regex->Pattern .'#', $value))
			throw new ValidationException($property->Regex->Message, 90403);
	}
	
	/**
	 * Normaliza um valor de acordo com o padrão do seu tipo
	 * @param	string	$type		tipo da propriedade
	 * @param	mixed	$value		valor da propriedade
	 * @return	mixed				retorna o valor normalizado caso seja null ou o próprio valor se não for null
	 */
	protected function defaultValue($type, $value)
	{
		if($type === 'String' && $value === null)
			$value = '';
		elseif($type === 'Boolean' && $value === null)
			$value = false;
		elseif(($type === 'Int' && $value === null) || ($type === 'Double' && $value === null))
			$value = 0;
		return $value;
	}
	
	/**
	 * Verifica se o tipo da propriedade é string
	 * @param	object	$property	anotação da propriedade
	 * @return	boolean				retorna true se for do tipo string, no contrário retorna false
	 */
	protected function isString($property)
	{
		$types = array('String','Date','DateTime');
		return in_array($property->Column->Type, $types);
	}
	
	/**
	 * Verifica se propriedade é chave primária
	 * @param	object	$property	anotação da propriedade
	 * @return	boolean				retorna true se for chave primária, no contrário retorna false
	 */
	protected function isKey($property)
	{
		return isset($property->Column) && isset($property->Column->Key);
	}
	
	/**
	 * Cria uma instrução SQL de inserção no banco
	 * @param	Model	$model		model a ser inserido
	 * @throws	DatabaseException	disparada caso o model não seja uma nova instância, ou não tenha a anotação Entity
	 * @return	void
	 */
	public function insert(Model $model)
	{
		$fields = array();
		$values = array();
		
		if(get_class($model) != $this->clazz)
			throw new DatabaseException("O objeto deve ser do tipo '". $this->clazz ."'");
		
		$class = $this->annotation->getClass();
		if(!$class->Entity)
			throw new DatabaseException('A classe '. get_class($model) .' não é uma entidade');
		
		if(!$model->_isNew()) 
			throw new DatabaseException('Para usar o método inserir é preciso criar uma nova instância de '. $this->clazz);
		
		foreach($model as $field => $value)
		{	
			$property = $this->annotation->getProperty($field);
			if($this->isField($property) && !$property->AutoGenerated)
			{
				$this->validate($property, $field, $value);
				
				if ($value === null) 
					continue;
				
				if($property->Column && $property->Column->Name)
					$field = $property->Column->Name;
				
				if (is_bool($value))
					$value = $value ? '1' : '0';
				
				$fields[] = '['. $field .']';
				$values[] = $value;
			}
		}
		$entity = $class->Entity ? $class->Entity : get_class($model);
			
		$sql = 'INSERT INTO '. $entity .' ('. implode($fields, ', ') .') VALUES ('. implode(',', array_fill(0, count($values), '?')) .');';
		
		Debug::addSql($sql, $values);
		$this->operations[] = array('sql' => $sql, 'values' => $values, 'model' => $model);
	}
	
	/**
	 * Cria uma instrução SQL de atualização no banco
	 * @param	Model	$model		model a ser atualizado
	 * @throws	DatabaseException	disparada caso o model seja uma nova instância, ou não tenha a anotação Entity
	 * @return	void
	 */
	public function update(Model $model)
	{
		$fields = array();
		$values = array();
		$conditions = array();
		
		if(get_class($model) != $this->clazz)
			throw new DatabaseException("O objeto deve ser do tipo '". $this->clazz ."'");
		
		$class = $this->annotation->getClass();
		if(!$class->Entity)
			throw new DatabaseException('A classe '. get_class($model) .' não é uma entidade');
		
		if($model->_isNew()) 
			throw new DatabaseException('O método update não pode ser utilizado com uma nova instância de '. $this->clazz);
		
		foreach($model as $field => $value)
		{	
			$property = $this->annotation->getProperty($field);
			if($this->isField($property))
			{
				if($this->isKey($property))
				{
					$conditions['fields'][] = '['. $field .'] = ?';
					$conditions['values'][] = $value;
				}
				else
				{
					$this->validate($property, $field, $value);
					
					if($value === null)
						continue;
					
					if(isset($property->Column) && isset($property->Column->Name))
						$field = $property->Column->Name;

					if (is_bool($value))
						$value = $value ? '1' : '0';
					
					$fields[] = '['. $field .'] = ?';
					$values[] = $value;
				}
			}
		}
		$entity = $class->Entity ? $class->Entity : get_class($model);
		$sql = 'UPDATE '. $entity .' SET '. implode(', ', $fields) .' WHERE '. implode(' AND ', $conditions['fields']) .';';
		
		Debug::addSql($sql, array_merge($values, $conditions['values']));
		$this->operations[] = array('sql' => $sql, 'values' => array_merge($values, $conditions['values']));
	}
	
	/**
	 * Cria uma instrução SQL de deleção no banco
	 * @param	Model	$model		model a ser deletado
	 * @throws	DatabaseException	disparada caso o model seja uma nova instância, ou não tenha a anotação Entity
	 * @return	void
	 */
	public function delete(Model $model)
	{
		$conditions = array();
		
		if(get_class($model) != $this->clazz)
			throw new DatabaseException("O objeto deve ser do tipo '". $this->clazz ."'");
		
		$class = $this->annotation->getClass();
		if(!$class->Entity)
			throw new DatabaseException('A classe '. get_class($model) .' não é uma entidade');
		
		if($model->_isNew()) 
			throw new DatabaseException('O método delete não pode ser utilizado com uma nova instância de '. $this->clazz);
		
		foreach($model as $field => $value)
		{	
			$property = $this->annotation->getProperty($field);
			if($this->isField($property) && $this->isKey($property))
			{
				$conditions['fields'][] = '['. $field .'] = ?';
				$conditions['values'][] = $value;
			}
		}
		$entity = $class->Entity ? $class->Entity : get_class($model);
		$sql = 'DELETE FROM '. $entity .' WHERE '. implode(' AND ', $conditions['fields']) .';';
		
		Debug::addSql($sql, $conditions['values']);
		$this->operations[] = array('sql' => $sql, 'values' => $conditions['values']);
	}
	
	/**
	 * Cria uma instrução SQL de deleção no banco
	 * @return	void
	 */
	public function deleteAll()
	{
		if (func_num_args() > 0) 
		{
			$reflectionMethod = new ReflectionMethod('SqlsrvDatasource', 'where');
			$args = func_get_args();
			$reflectionMethod->invokeArgs($this, $args);
		}
		
		$where = $this->where ? ' WHERE '. $this->where : '';
		$orderby = $this->orderby ? ' ORDER BY '. $this->orderby : '';
		$limit = $this->limit ? ' LIMIT '. $this->limit : '';
		
		$sql = 'DELETE FROM '. $this->table . $where . $orderby . $limit .';';
		
		Debug::addSql($sql, $this->where_params);
		$this->operations[] = array('sql' => $sql, 'values' => $this->where_params);
	}
	
	/**
	 * Pega o ID da ultima instrunção de um model específico
	 * @return	int		retorna o valor do ID
	 */
	public function lastInsertId()
	{
		return $this->connection()->lastInsertId($this->table);
	}
}