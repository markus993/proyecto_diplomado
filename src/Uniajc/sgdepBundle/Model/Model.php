<?php

	namespace Uniajc\sgdepBundle\Model;
	use Uniajc\sgdepBundle\Entity\Notificacion;
	use Uniajc\sgdepBundle\Entity\EjecucionPlan;
	class Model {
		
		protected  $em;
		protected  $connection;

		public function __construct(\Doctrine\ORM\EntityManager $emi){
			$this->em = $emi; 
			$this->connection = $emi->getConnection();
		}   

		public function loadTemasBD($materia, $sesion){
			$statement = $this->connection->prepare('SELECT
												"ejecucion_plan".tema
											FROM
												asignatura
											INNER JOIN "Informacion_asignatura" ON "Informacion_asignatura".id_asignatura = asignatura."id" AND "Informacion_asignatura".id_asignatura = asignatura."id"
											INNER JOIN "Asignacion" ON "Asignacion".id_informacion = "Informacion_asignatura".id_informacion
											INNER JOIN "ejecucion_plan" ON "ejecucion_plan".id_asignacion = asignatura."id" 
											INNER JOIN plan_curso ON plan_curso.id_asignacion = "Asignacion".id_asignacion AND plan_curso.id_asignacion = "Asignacion".id_asignacion
											INNER JOIN docente ON "Asignacion".id_docente = docente."id"
											INNER JOIN persona ON docente.id_persona = persona."id" AND docente."id" = persona.identificacion AND docente.id_persona = persona."id" AND docente."id" = persona.identificacion
											INNER JOIN "Unidad_tematica" ON "Unidad_tematica".id_informacion = "Informacion_asignatura".id_informacion AND "Unidad_tematica".id_informacion = "Informacion_asignatura".id_informacion
											WHERE 
												asignatura.id  = :materia
											AND
												plan_curso.sesion  = :sesion 
											AND "public"."Unidad_tematica".semanas = "public".plan_curso.sesion;');
			$statement->bindValue('materia', $materia);
			$statement->bindValue('sesion', $sesion);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadAllTemasBD($materia){
			$statement = $this->connection->prepare('SELECT
											"public"."Unidad_tematica".id_unidad,
											"public"."Unidad_tematica".nombre AS tema
											FROM
											"public".asignatura
											INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
											WHERE
											"public".asignatura."id" = :materia');
			$statement->bindValue('materia', $materia);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadTemasDefaultBD($materia, $sesion){
			$statement = $this->connection->prepare('SELECT
												"public"."Unidad_tematica".nombre AS tema
											FROM
												"public".asignatura
												INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."Asignacion".id_asignacion
												INNER JOIN "public".programa ON "public"."Informacion_asignatura".id_programa = "public".programa."id"
												INNER JOIN "public".facultad ON "public".programa.id_facultad = "public".facultad."id"
											WHERE
												"public"."Unidad_tematica".semanas = "public".plan_curso.sesion AND 
												"public".asignatura."id" = :materia');
			$statement->bindValue('materia', $materia);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadSesionesBD($materia){
			$statement = $this->connection->prepare('SELECT
												"public".plan_curso.sesion
											FROM
												"public".asignatura
											INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
											INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."Asignacion".id_asignacion
											INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
											WHERE
												"public".plan_curso.sesion = "public"."Unidad_tematica".semanas AND
												"public".asignatura."id" = :materia');
			$statement->bindValue('materia', $materia);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadMailDocentesBD(){
			$statement = $this->connection->prepare('SELECT
												"public"."ejecucion_plan".id_ejecucion,
												"public"."persona".email AS mail_docente,
												"public"."asignatura".nombre AS materia,
												"public".ejecucion_plan.fecha AS fecha_vencida,
												"public".plan_curso.sesion AS sesion_vencida
												FROM
												"ejecucion_plan"
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."ejecucion_plan".id_asignacion 
												INNER JOIN "public"."persona" ON "public"."Asignacion".id_docente = "public"."persona".identificacion
												INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."ejecucion_plan".id_asignacion 
												INNER JOIN "public"."Informacion_asignatura" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public".asignatura ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												LEFT JOIN "public".notificacion ON "public"."ejecucion_plan".id_ejecucion = "public".notificacion.id_ejecucion
												WHERE 
												ejecucion_plan.fecha < now() 
												AND
												"public".notificacion."id" IS NULL');
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadDocenteBD($id_docente){
			$statement = $this->connection->prepare('SELECT DISTINCT
												"public".asignatura."id" AS id_asignatura,
												"public".asignatura.nombre AS nombre,
												"public"."Asignacion".periodo AS periodo
												FROM
												"public"."Informacion_asignatura"
												INNER JOIN "public".asignatura ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
												INNER JOIN "public".persona ON "public".docente.id_persona = "public".persona."id" AND "public".docente."id" = "public".persona.identificacion
												WHERE "public".persona."identificacion" =  :id_docente');
			$statement->bindValue('id_docente', $id_docente);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadVoceroBD($id_vocero){
			$statement = $this->connection->prepare('SELECT DISTINCT
											"public".asignatura."id" AS id_asignatura,
											"public".asignatura.nombre AS nombre,
											"public"."Asignacion".periodo AS periodo
											FROM
											"public"."Informacion_asignatura"
											INNER JOIN "public".asignatura ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
											INNER JOIN "public".estudiante ON "public"."Asignacion".id_estudiante = "public".estudiante."id"
											INNER JOIN "public".persona ON "public".estudiante.id_persona = "public".persona."id" AND "public".estudiante."id" = "public".persona.identificacion
											WHERE "public".persona."identificacion" =  :id_vocero');
			$statement->bindValue('id_vocero', $id_vocero);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function insertNotificacionBD($id_ejecucion,$destinatarios,$cuerpo_correo){
			$notificacion = new Notificacion;
			$notificacion->setIdEjecucion($id_ejecucion); 
			$notificacion->setDestinatarios($destinatarios); 
			$notificacion->setCuerpoCorreo($cuerpo_correo); 

			$this->em->persist($notificacion);
			return $this->em->flush();
		}

		public function getObject($id,$name_object){
			echo "$id,$name_object";
			$repository = $this->em->getRepository('UniajcsgdepBundle:'.$name_object);
			//$object = $repository->findOneById( array('id_ejecucion' => $id));

			var_dump($object->getDQL());
			 if (!$object) {
				throw $this->createNotFoundException(
					'No object found for id '.$id
				);
			}
			return $object;
		}
	} 