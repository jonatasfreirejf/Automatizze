<?php
	namespace App\Config\Banco;
    use App\Config\Security\DataSecurity;
	/**
	 * 
	 */
	class Connection extends DataSecurity
	{

		private $dbHost;
		private $dbUser;
		private $dbPassword;
		private $dbPort;
		private $dbName;
		protected $connection;


		protected function connect()
		{
			$this->dbHost = $_ENV['DB_HOST'];
			$this->dbUser = $_ENV['DB_USER'];
			$this->dbPassword = $_ENV['DB_PASSWORD'];
			$this->dbPort = $_ENV['DB_PORT'];
			$this->dbName = $_ENV['DB_NAME'];

			$this->connection = new \mysqli($this->dbHost,$this->dbUser, $this->dbPassword, $this->dbName);
			if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
		}

		protected function disconnect()
		{
            mysqli_close($this->connection);
		}
	}
?>