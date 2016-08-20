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
			$statement = $this->connection->prepare('SELECT DISTINCT
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

		public function loadDirectorBD($id_director){
			$statement = $this->connection->prepare('SELECT DISTINCT
												"public".asignatura."id" AS id_asignatura,
												"public".asignatura.nombre AS nombre,
												"public"."Asignacion".periodo AS periodo
												FROM
												"public"."Informacion_asignatura"
												INNER JOIN "public".asignatura ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
												INNER JOIN "public".persona ON "public".docente.id_persona = "public".persona."id" AND "public".docente."id" = "public".persona.identificacion');
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

		public function insertEjecucionBD($id_ejecucion,$id_asignacion,$id_facultad,$id_plan,$fecha_sesion){
			$sql = 'INSERT INTO 
						"public"."ejecucion_plan" 
			("id_ejecucion","id_asignacion","id_facultad","id_plan","fecha","checkbox_docente","checkbox_estudiante","observacion_docente","observacion_Facultad")
					 VALUES 
			(:id_ejecucion, :id_asignacion, :id_facultad, :id_plan, :fecha_sesion, :checkbox_docente, :checkbox_estudiante, :observacion_docente, :observacion_Facultad)';
			$statement = $this->connection->prepare($sql);
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('id_asignacion', $id_asignacion);
			$statement->bindValue('id_facultad', $id_facultad);
			$statement->bindValue('id_plan', $id_plan);
			$statement->bindValue('fecha_sesion', $fecha_sesion);
			$statement->bindValue('checkbox_docente', 'f');
			$statement->bindValue('checkbox_estudiante', 'f');
			$statement->bindValue('observacion_docente', ' ');
			$statement->bindValue('observacion_Facultad', ' ');
			$statement->execute();
			$results = $statement->fetchAll();
		}		

		public function loadEjecucionDataBD($id_asignatura,$sesion){
			$statement = $this->connection->prepare('SELECT
													"public".plan_curso.id_asignacion,
													"public"."programa".id_facultad,
													"public".plan_curso.id_plan, 
													"public".asignatura.intensidad_horaria,
													"public".plan_curso.fecha_sesion AS fecha_sesion 
												FROM
													"public".asignatura
												INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."programa" ON "public"."Informacion_asignatura".id_programa = "public".programa."id"
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion 
												INNER JOIN "public".plan_curso ON "public".plan_curso.sesion = "public"."Unidad_tematica".semanas AND "public"."Asignacion".id_asignacion = "public".plan_curso.id_asignacion
												WHERE
													"public"."Unidad_tematica".semanas = :sesion
												AND 
													"public".asignatura.id = :id_asignatura');
			$statement->bindValue('id_asignatura', $id_asignatura);
			$statement->bindValue('sesion', $sesion);
			$statement->execute();
			return $results = $statement->fetchAll();
		}		

		public function loadEjecucionBD($id_asignatura,$sesion){
			$statement = $this->connection->prepare('SELECT
													"public".asignatura.nombre AS asignatura,
													"public".ejecucion_plan.id_ejecucion,
													"public".ejecucion_plan.checkbox_docente,
													"public".ejecucion_plan.checkbox_estudiante,
													"public".ejecucion_plan.observacion_docente,
													"public".ejecucion_plan."observacion_Facultad",
													"public".plan_curso.fecha_sesion AS fecha_sesion,
													"public".docente."id" AS identificacion_docente,
													"public".asignatura.intensidad_horaria
												FROM
													"public".asignatura
												INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
												INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
												INNER JOIN "public".plan_curso ON "public".plan_curso.sesion = "public"."Unidad_tematica".semanas AND "public"."Asignacion".id_asignacion = "public".plan_curso.id_asignacion
												INNER JOIN "public".ejecucion_plan ON "public".ejecucion_plan.id_asignacion = "public"."Asignacion".id_asignacion AND "public".ejecucion_plan.id_plan = "public".plan_curso.id_plan
												INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
												WHERE 
													"public".plan_curso.sesion = :sesion 
												AND 
													"public".asignatura.id = :id_asignatura 
												AND
													"public"."Unidad_tematica".semanas = "public".plan_curso.sesion');
			$statement->bindValue('id_asignatura', $id_asignatura);
			$statement->bindValue('sesion', $sesion);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadSesionesReporteBD($id_asignatura){
			$statement = $this->connection->prepare('SELECT
											per_docente.nombres || '."' '".' || per_docente.apellidos AS docente,
											per_estudiante.nombres || '."' '".' || per_estudiante.apellidos AS estudiante,
											"public".asignatura.nombre AS asignatura,
											"public".ejecucion_plan.checkbox_docente,
											"public".ejecucion_plan.checkbox_estudiante,
											"public".ejecucion_plan.observacion_docente,
											"public".ejecucion_plan."observacion_Facultad",
											"public".facultad.nombre AS facultad,
											"public".plan_curso.fecha_sesion AS fecha_sesion,
											"public".asignatura.intensidad_horaria
											FROM
											"public".asignatura
											INNER JOIN "public"."Informacion_asignatura" ON "public"."Informacion_asignatura".id_asignatura = "public".asignatura."id"
											INNER JOIN "public"."Asignacion" ON "public"."Asignacion".id_informacion = "public"."Informacion_asignatura".id_informacion
											INNER JOIN "public".plan_curso ON "public".plan_curso.id_asignacion = "public"."Asignacion".id_asignacion
											INNER JOIN "public".ejecucion_plan ON "public".ejecucion_plan.id_asignacion = "public"."Asignacion".id_asignacion AND "public".ejecucion_plan.id_plan = "public".plan_curso.id_plan
											INNER JOIN "public".facultad ON "public".ejecucion_plan.id_facultad = "public".facultad."id"
											INNER JOIN "public".docente ON "public"."Asignacion".id_docente = "public".docente."id"
											INNER JOIN "public".estudiante ON "public"."Asignacion".id_estudiante = "public".estudiante."id"
											INNER JOIN "public".persona AS per_docente ON "public".docente.id_persona = per_docente."id" AND "public".docente."id" = per_docente.identificacion
											INNER JOIN "public".persona AS per_estudiante ON "public".estudiante.id_persona = per_estudiante."id" AND "public".estudiante."id" = per_estudiante.identificacion
											INNER JOIN "public"."Unidad_tematica" ON "public"."Unidad_tematica".id_informacion = "public"."Informacion_asignatura".id_informacion
											WHERE 
												"public".asignatura.id = :id_asignatura 
											AND
												"public"."Unidad_tematica".semanas = "public".plan_curso.sesion');
			$statement->bindValue('id_asignatura', $id_asignatura);
			$statement->execute();
			return $results = $statement->fetchAll();
		}

		public function loadIDEjecucionBD(){
			$statement = $this->connection->prepare('SELECT max("public".ejecucion_plan.id_ejecucion) as id FROM "public".ejecucion_plan LIMIT 1');
			$statement->execute();
			$results = $statement->fetchAll();
			return $id_ejecucion = $results[0]['id'];
		}

		public function insertNotificacionBD($id_ejecucion,$destinatarios,$cuerpo_correo){
			/*$notificacion = new Notificacion;
			$notificacion->setIdEjecucion($id_ejecucion); 
			$notificacion->setDestinatarios($destinatarios); 
			$notificacion->setCuerpoCorreo($cuerpo_correo); 

			$this->em->persist($notificacion);
			return $this->em->flush();*/

			$sql = 'INSERT INTO 
							"public".notificacion 
							(id_ejecucion, cuerpo_correo, destinatarios) 
							VALUES
							(:id_ejecucion, :cuerpo, :mail)';
			$statement = $this->connection->prepare($sql);
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('cuerpo', $cuerpo_correo);
			$statement->bindValue('mail', $destinatarios);
			//$rows = $statement->execute();
		}

		public function getObject($id,$name_object){
			$repository = $this->em->getRepository('UniajcsgdepBundle:EjecucionPlan');
			echo "$id,$name_object";
			//$object = $repository->findOneById( array('id_ejecucion' => $id));
			return '';//$object;
		}

		public function saveVoceroBD($id_ejecucion, $checked ){
			$sql1 = "UPDATE 
						ejecucion_plan
					SET 
						checkbox_estudiante= :checked
					WHERE 
						id_ejecucion  = :id_ejecucion";
			$statement = $this->connection->prepare($sql1);
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('checked', $checked);
			return $statement->execute();
		}

		public function saveDocenteBD($id_ejecucion, $observacion_docente, $fecha, $checked,$horas ){
			$statement = $this->connection->prepare("UPDATE 
														ejecucion_plan
													SET 
														observacion_docente= :observacion_docente,
														fecha= :fecha,
														checkbox_docente= :checked
													WHERE 
														id_ejecucion  = :id_ejecucion");
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('observacion_docente', $observacion_docente);
			$statement->bindValue('fecha', $fecha);
			//$statement->bindValue('horas', $horas);
			$statement->bindValue('checked', $checked);
			return $statement->execute();
		}

		public function saveDocenteTemasBD($id_ejecucion, $temas ){
			$statement = $this->connection->prepare("UPDATE 
														ejecucion_plan
													SET 
														checkbox_estudiante= :checked
													WHERE 
														id_asignacion = :id_asignacion
													AND
														id_ejecucion  = :id_ejecucion
													AND
														id_facultad  = :id_facultad 
													AND
														id_plan  = :id_plan");
			$statement->bindValue('id_asignacion', $id_asignacion);
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('id_facultad', $id_facultad);
			$statement->bindValue('id_plan', $id_plan);
			$statement->bindValue('checked', $checked);
			return $statement->execute();
		}

		public function saveDirectorBD($id_ejecucion, $observacion_Facultad ){
			$statement = $this->connection->prepare('UPDATE 
														ejecucion_plan
													SET 
														"observacion_Facultad"= :observacion_Facultad
													WHERE 
														id_ejecucion  = :id_ejecucion');
			$statement->bindValue('id_ejecucion', $id_ejecucion);
			$statement->bindValue('observacion_Facultad', $observacion_Facultad);
			return $statement->execute();
		}
	} 