<?php
class CandidatoModel

{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=re_votaciones', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM candidatos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Candidato();

				$alm->__SET('id', $r->id);
				$alm->__SET('Dui', $r->dui);
				$alm->__SET('Nombre', $r->nombre);
				$alm->__SET('Apellido', $r->apellido);
				$alm->__SET('Departamento', $r->departamento);
				$alm->__SET('Municipio', $r->municipio);
				$alm->__SET('Bandera', $r->bandera);
				$alm->__SET('Partido', $r->partido);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM candidatos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Candidato();

			$alm->__SET('id', $r->id);
			$alm->__SET('Dui', $r->dui);
			$alm->__SET('Nombre', $r->nombre);
			$alm->__SET('Apellido', $r->apellido);
			$alm->__SET('Departamento', $r->departamento);
			$alm->__SET('Municipio', $r->municipio);
			$alm->__SET('Bandera', $r->bandera);
			$alm->__SET('Partido', $r->partido);


			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM candidatos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Candidato $data)
	{
		try 
		{
			$sql = "UPDATE candidatos SET 
						Nombre          = ?,
						Dui             = ?, 
						Apellido        = ?,
						Departamento    = ?,
						Municipio       = ?,
						Bandera         = ?, 
						Partido         = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Dui'),
					$data->__GET('Apellido'),
					$data->__GET('Departamento'),
					$data->__GET('Municipio'),
					$data->__GET('Bandera'),
					$data->__GET('Partido'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Candidato $data)
	{
		try 
		{
		$sql = "INSERT INTO candidatos (Nombre,Dui,Apellido,Departamento,Municipio,Bandera,Partido) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre'), 
				$data->__GET('Dui'),
				$data->__GET('Apellido'), 
				$data->__GET('Departamento'),
				$data->__GET('Municipio'),
				$data->__GET('Bandera'),
				$data->__GET('Partido')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}