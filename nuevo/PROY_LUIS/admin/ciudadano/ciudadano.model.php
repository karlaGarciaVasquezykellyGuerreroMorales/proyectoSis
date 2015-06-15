<?php
class CiudadanoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM ciudadano");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Ciudadano();

				$alm->__SET('id', $r->id);
				$alm->__SET('Dui', $r->dui);
				$alm->__SET('Nombre', $r->nombre);
				$alm->__SET('Apellido', $r->apellido);
				$alm->__SET('Sexo', $r->sexo);
				$alm->__SET('FechaNacimiento', $r->fechaNacimiento);
				$alm->__SET('Departamento', $r->departamento);
				$alm->__SET('Municipio', $r->municipio);

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
			          ->prepare("SELECT * FROM ciudadano WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Ciudadano();

			$alm->__SET('id', $r->id);
			$alm->__SET('Dui', $r->dui);
			$alm->__SET('Nombre', $r->nombre);
			$alm->__SET('Apellido', $r->apellido);
			$alm->__SET('Sexo', $r->sexo);
			$alm->__SET('FechaNacimiento', $r->fechaNacimiento);
			$alm->__SET('Departamento', $r->departamento);
			$alm->__SET('Municipio', $r->municipio);


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
			          ->prepare("DELETE FROM ciudadano WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Ciudadano $data)
	{
		try 
		{
			$sql = "UPDATE ciudadano SET 
						Nombre          = ?,
						Dui             = ?, 
						Apellido        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?,
						Departamento    = ?,
						Municipio       = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Dui'),
					$data->__GET('Apellido'), 
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('Departamento'),
					$data->__GET('Municipio'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Ciudadano $data)
	{
		try 
		{
		$sql = "INSERT INTO ciudadano (Nombre,Dui,Apellido,Sexo,FechaNacimiento,Departamento,Municipio) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre'), 
				$data->__GET('Dui'),
				$data->__GET('Apellido'), 
				$data->__GET('Sexo'),
				$data->__GET('FechaNacimiento'),
				$data->__GET('Departamento'),
				$data->__GET('Municipio')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}