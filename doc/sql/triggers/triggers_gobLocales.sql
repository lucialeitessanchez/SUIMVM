USE migyd_rufem;
DELIMITER $$

							CREATE TRIGGER gob_locales_update BEFORE UPDATE ON migyd_rufem.gob_locales
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'UPDATE';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							IF NOT (OLD.id_gob_locales <=> NEW.id_gob_locales) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'id_gob_locales',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.id_gob_locales,
										val_new = NEW.id_gob_locales,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_1 <=> NEW.gobloc_1_1) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_1',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_1,
										val_new = NEW.gobloc_1_1,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_3 <=> NEW.gobloc_1_3) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_3',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_3,
										val_new = NEW.gobloc_1_3,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_4 <=> NEW.gobloc_1_4) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_4',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_4,
										val_new = NEW.gobloc_1_4,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_5 <=> NEW.gobloc_1_5) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_5',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_5,
										val_new = NEW.gobloc_1_5,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_6 <=> NEW.gobloc_1_6) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_6',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_6,
										val_new = NEW.gobloc_1_6,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_6a <=> NEW.gobloc_1_6a) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_6a',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_6a,
										val_new = NEW.gobloc_1_6a,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_7 <=> NEW.gobloc_1_7) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_7',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_7,
										val_new = NEW.gobloc_1_7,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_8 <=> NEW.gobloc_1_8) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_8',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_8,
										val_new = NEW.gobloc_1_8,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.gobloc_1_9 <=> NEW.gobloc_1_9) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'gobloc_1_9',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.gobloc_1_9,
										val_new = NEW.gobloc_1_9,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.caso_id_caso <=> NEW.caso_id_caso) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'caso_id_caso',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.caso_id_caso,
										val_new = NEW.caso_id_caso,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.fecha_carga <=> NEW.fecha_carga) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'fecha_carga',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.fecha_carga,
										val_new = NEW.fecha_carga,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.usuario_carga <=> NEW.usuario_carga) THEN
								INSERT INTO migyd_rufem_auditoria SET
										accion = @accion,
										tabla = 'gob_locales',
										campo = 'usuario_carga',
										registro_id = NEW.id_gob_locales,
										val_old = OLD.usuario_carga,
										val_new = NEW.usuario_carga,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;
END;
$$
DELIMITER ;


DELIMITER $$

							CREATE TRIGGER gob_locales_insert AFTER INSERT ON migyd_rufem.gob_locales
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'INSERT';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'id_gob_locales',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.id_gob_locales,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_1',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_1,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_3',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_3,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_4',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_4,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_5',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_5,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_6',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_6,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_6a',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_6a,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_7',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_7,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_8',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_8,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_9',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.gobloc_1_9,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'caso_id_caso',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.caso_id_caso,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'fecha_carga',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.fecha_carga,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'usuario_carga',
								registro_id = NEW.id_gob_locales,
								val_old = NULL,
								val_new = NEW.usuario_carga,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;
END;
$$
DELIMITER ;


DELIMITER $$

							CREATE TRIGGER gob_locales_delete BEFORE DELETE ON migyd_rufem.gob_locales
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'DELETE';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'id_gob_locales',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.id_gob_locales,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_1',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_1,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_3',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_3,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_4',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_4,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_5',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_5,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_6',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_6,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_6a',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_6a,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_7',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_7,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_8',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_8,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'gobloc_1_9',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.gobloc_1_9,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'caso_id_caso',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.caso_id_caso,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'fecha_carga',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.fecha_carga,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO migyd_rufem_auditoria SET
								accion = @accion,
								tabla = 'gob_locales',
								campo = 'usuario_carga',
								registro_id = OLD.id_gob_locales,
								val_old = OLD.usuario_carga,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;
END;
$$
DELIMITER ;
