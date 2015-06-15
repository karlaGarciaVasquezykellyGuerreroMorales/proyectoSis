<?php
class PartidoModel

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

			$stm = $this->pdo->prepare("SELECT * FROM partidos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Partido();

				$alm->__SET('id', $r->id);
				$alm->__SET('NombrePartido', $r->nombrePartido);
				$alm->__SET('Bandera', $r->bandera);
				$alm->__SET('Dui', $r->dui);
				$alm->__SET('Responsable', $r->responsable);

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
			          ->prepare("SELECT * FROM partidos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Partido();

			    $alm->__SET('id', $r->id);
				$alm->__SET('NombrePartido', $r->nombrePartido);
				$alm->__SET('Bandera', $r->bandera);
				$alm->__SET('Dui', $r->dui);
				$alm->__SET('Responsable', $r->responsable);

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
			          ->prepare("DELETE FROM partidos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Partido $data)
	{
		try 
		{
			$sql = "UPDATE partidos SET 
						NombrePartido   = ?,
						Bandera         = ?, 
						Dui             = ?,
						Responsable     = ?
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('NombrePartido'), 
					$data->__GET('Bandera'),
					$data->__GET('Dui'),
					$data->__GET('Responsable'),
					
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Partido $data)
	{
		try 
		{
		$sql = "INSERT INTO partidos (NombrePartido,Bandera,Dui,Responsable) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				    $data->__GET('NombrePartido'), 
					$data->__GET('Bandera'),
					$data->__GET('Dui'),
					$data->__GET('Responsable'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}