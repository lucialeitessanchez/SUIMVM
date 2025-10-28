                         'Tortura' => 'Tortura',
                        'Existencia de violencia sexual' => 'Existencia de violencia sexual',
                        'Privacion ilegitima de la libertad' =>'Privacion ilegitima de la libertad',
                        'Violencia en contexto de grupo de hombres'=>'Violencia en contexto de grupo de hombres',
                        'Signos de violencia simbolica'=>'Signos de violencia simbolica',
                        'Traslado al extranjero o a ciudad lejana'=>'Traslado al extranjero o a ciudad lejana',
                        'Incomunicacion de la victima'=>'Incomunicacion de la victima',
                        'Suministro de estupefacientes'=>'Suministro de estupefacientes',
                        'Homicidios sin cuerpo'=>'Homicidios sin cuerpo',
                        'Cuerpo desechado'=>'Cuerpo desechado',
                        'Violencia excesiva'=>'Violencia excesiva',
                        'Más de un procedemiento homicida'=>'Más de un procedemiento homicida'

                        INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
                        (NULL, 'OTRA_VIOLENCIA', 'Existencia de violencia sexual'),
                        (NULL, 'OTRA_VIOLENCIA','Privacion ilegitima de la libertad'),
                        (NULL, 'OTRA_VIOLENCIA','Violencia en contexto de grupo de hombres'),
                        (NULL, 'OTRA_VIOLENCIA','Signos de violencia simbolica'),
                        (NULL, 'OTRA_VIOLENCIA','Traslado al extranjero o a ciudad lejana'),
                        (NULL, 'OTRA_VIOLENCIA','Incomunicacion de la victima'),
                        (NULL, 'OTRA_VIOLENCIA','Suministro de estupefacientes'),
                        (NULL, 'OTRA_VIOLENCIA','Homicidios sin cuerpo'),
                        (NULL, 'OTRA_VIOLENCIA','Cuerpo desechado'),
                        (NULL, 'OTRA_VIOLENCIA','Violencia excesiva'),
                        (NULL, 'OTRA_VIOLENCIA','Más de un procedemiento homicida')
                         ;

                         *MECANICA DEL HECHO
                          'Arma de fuego' => 'arma de fuego',
                        'Arma blanca' => 'arma blanca',
                        'Ahorcamiento' =>'ahorcamiento',
                        'Asfixia'=>'asfixia',
                        'Golpes con objetos'=>'golpes con objetos',
                        'Golpes con objetos contundentes'=>'golpes con objetos contundentes',
                        'Golpes de puño'=>'golpes de puño',
                        'Quemaduras'=>'quemaduras',
                        'Otros medios'=>'otros medios',
                        'Sin determinar'=>'sin determinar',
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
                        (NULL, 'MECANICA_HECHO', 'Arma de fuego'),
                        (NULL, 'MECANICA_HECHO','Arma blanca'),
                        (NULL, 'MECANICA_HECHO','Ahorcamiento'),
                        (NULL, 'MECANICA_HECHO','Asfixia'),
                        (NULL, 'MECANICA_HECHO','Golpes con objetos'),
                        (NULL, 'MECANICA_HECHO','Golpes con objetos contundentes'),
                        (NULL, 'MECANICA_HECHO','Golpes de puño'),
                        (NULL, 'MECANICA_HECHO','Quemaduras'),
                        (NULL, 'MECANICA_HECHO','Otros medios'),
                        (NULL, 'MECANICA_HECHO','Sin determinar');
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
                        (NULL, 'TIPO_HECHO', 'Presuntamente se trata de una muerte en contexto de criminalidad organizada'),
                        (NULL, 'TIPO_HECHO','Presuntamente se trata de una muerte en contexto de robo')

INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
                        (NULL, 'ORIENTACION_SEXUAL', 'Lesbiana'),
                        (NULL, 'ORIENTACION_SEXUAL','Varon gay'),        
                        (NULL, 'ORIENTACION_SEXUAL','Bisexual'),
                        (NULL, 'ORIENTACION_SEXUAL','Heterosexual'),
                        (NULL, 'ORIENTACION_SEXUAL','Otro')        

SDDNAyF
TIPO_INTERVENCION
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'TIPO_INTERVENCION', 'Asesoramiento y orientacion'),
(NULL, 'TIPO_INTERVENCION', 'Derivacion a servicio local'),
(NULL, 'TIPO_INTERVENCION', 'Adopcion de medida de proteccion excepcional')

MOTIVO_MEDIDA_PROTECCION
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Dificultades en el ejercicio de la responsabilidad parental - Consumo problematico'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Dificultades en el ejercicio de la responsabilidad parental - Padecimiento de salud mental'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Ausencia de responsables parentales - Abandono'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Ausencia de responsables parentales - Fallecimiento'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Ausencia de responsables parentales - Privacion de libertad'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Ausencia de responsables parentales - Femicidio'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Violencia hacia NNA - Violencia fisica'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Violencia hacia NNA - Violencia sexual'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Violencia hacia NNA - Violencia psicologica'),
(NULL, 'MOTIVO_MEDIDA_PROTECCION', 'Violencia hacia NNA - Violencia simbolica')

SEDE SDDNAyF
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Rosario'),                        
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Santa Fe'),
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Reconquista'),                         
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Vera'), 
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Rafaela'), 
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF San Lorenzo'), 
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Villa Constitucion'), 
(NULL, 'SEDE_SDDNAyF', 'SEDE_SDDNAyF - Direccion Provincial de NAyF Venado Tuerto')

TRAYECTORIA ALOJAMIENTO
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'TRAYECTORIA_ALOJAMIENTO', 'Centro residencial'),                        
(NULL, 'TRAYECTORIA_ALOJAMIENTO', 'Familia ampliada'),                        
(NULL, 'TRAYECTORIA_ALOJAMIENTO', 'Familia solidaria'),   
(NULL, 'TRAYECTORIA_ALOJAMIENTO', 'Familia abierta'),                          
(NULL, 'TRAYECTORIA_ALOJAMIENTO', 'Progenitor/a')

MOTIVO_RESOLUCION_MEDIDA
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'MOTIVO_RESOLUCION_MEDIDA', 'Cese de intervencion por retorno con representantes legales'),       
(NULL, 'MOTIVO_RESOLUCION_MEDIDA', 'Cese de intervencion por mayoria de edad'),       
(NULL, 'MOTIVO_RESOLUCION_MEDIDA', 'Situacion de adoptabilidad'),       
(NULL, 'MOTIVO_RESOLUCION_MEDIDA', 'Proyecto de autonomia'),       
(NULL, 'MOTIVO_RESOLUCION_MEDIDA', 'Tutela/guarda con familia ampliada y/o de la comunidad')

MOTIVO_EGRESO_SISTEMA
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'MOTIVO_EGRESO_SISTEMA', 'Cese de intervencion por retorno con representantes legales'),    
(NULL, 'MOTIVO_EGRESO_SISTEMA', 'Cese de intervencion por mayoria de edad'),    
(NULL, 'MOTIVO_EGRESO_SISTEMA', 'Tutela/guarda'),    
(NULL, 'MOTIVO_EGRESO_SISTEMA', 'Juicio de adopcion')    

PGCSJ_TIPO_MEDIDA
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Exclusion del hogar'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Prohibicion de acercamiento (medida de distancia)'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Boton de alerta'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Restitucion de bienes personales'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Restriccion electronica (tobillera o similar)'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Orden de medidas de seguridad en el domicilio'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Prohibicion de compra y tenencia de armas'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Asistencia medica y psicologica'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Regimen de cuidado personal'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Regimen de comunicacion'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Cuota alimentaria'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Derivacion al taller de masculinidades del agresor'),    
(NULL, 'PGCSJ_TIPO_MEDIDA', 'Derivacion del agresor a un espacio terapeutico')


PGCSJ_TIPO_PROCEDIMIENTO
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'PGCSJ_TIPO_PROCEDIMIENTO', 'Violencia familiar'),    
(NULL, 'PGCSJ_TIPO_PROCEDIMIENTO', 'Divorcios'),    
(NULL, 'PGCSJ_TIPO_PROCEDIMIENTO', 'Cuidado personal'),    
(NULL, 'PGCSJ_TIPO_PROCEDIMIENTO', 'Comunicacion'),    
(NULL, 'PGCSJ_TIPO_PROCEDIMIENTO', 'Cuota alimentaria')

PGCSJ_13 (equipos intervinientes)
INSERT INTO `nomenclador` (`id_nomenclador`, `nomenclador`, `valor_nomenclador`) VALUES 
(NULL, 'PGCSJ_13', 'Equipo local de violencia'),   
(NULL, 'PGCSJ_13', 'Equipos de asistencia medica'),   
(NULL, 'PGCSJ_13', 'Asistencia psicologica'),   
(NULL, 'PGCSJ_13', 'Asistencia legal'),   
(NULL, 'PGCSJ_13', 'Asistencia social') 