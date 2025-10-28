USE smgyd_suimvm;
DELIMITER $$

							CREATE TRIGGER persona_update BEFORE UPDATE ON smgyd_suimvm.persona
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'UPDATE';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							IF NOT (OLD.id_persona <=> NEW.id_persona) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'id_persona',
										registro_id = NEW.id_persona,
										val_old = OLD.id_persona,
										val_new = NEW.id_persona,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.nombre <=> NEW.nombre) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'nombre',
										registro_id = NEW.id_persona,
										val_old = OLD.nombre,
										val_new = NEW.nombre,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.apellido <=> NEW.apellido) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'apellido',
										registro_id = NEW.id_persona,
										val_old = OLD.apellido,
										val_new = NEW.apellido,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.nrodoc <=> NEW.nrodoc) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'nrodoc',
										registro_id = NEW.id_persona,
										val_old = OLD.nrodoc,
										val_new = NEW.nrodoc,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.sexo <=> NEW.sexo) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'sexo',
										registro_id = NEW.id_persona,
										val_old = OLD.sexo,
										val_new = NEW.sexo,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.genero_autop <=> NEW.genero_autop) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'genero_autop',
										registro_id = NEW.id_persona,
										val_old = OLD.genero_autop,
										val_new = NEW.genero_autop,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.orientacion_sexual_id <=> NEW.orientacion_sexual_id) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'orientacion_sexual_id',
										registro_id = NEW.id_persona,
										val_old = OLD.orientacion_sexual_id,
										val_new = NEW.orientacion_sexual_id,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;IF NOT (OLD.nacionalidad <=> NEW.nacionalidad) THEN
								INSERT INTO suimvm_auditoria SET
										accion = @accion,
										tabla = 'persona',
										campo = 'nacionalidad',
										registro_id = NEW.id_persona,
										val_old = OLD.nacionalidad,
										val_new = NEW.nacionalidad,
										usuario = @user_name,
										dir_ip = @dir_ip_cliente,
										marca =  @marca;
								END IF;
END;
$$
DELIMITER ;


DELIMITER $$

							CREATE TRIGGER persona_insert AFTER INSERT ON smgyd_suimvm.persona
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'INSERT';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'id_persona',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.id_persona,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nombre',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.nombre,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'apellido',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.apellido,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nrodoc',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.nrodoc,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'sexo',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.sexo,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'genero_autop',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.genero_autop,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'orientacion_sexual_id',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.orientacion_sexual_id,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nacionalidad',
								registro_id = NEW.id_persona,
								val_old = NULL,
								val_new = NEW.nacionalidad,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;
END;
$$
DELIMITER ;


DELIMITER $$

							CREATE TRIGGER persona_delete BEFORE DELETE ON smgyd_suimvm.persona
							FOR EACH ROW
							BEGIN
								SET @marca = NOW();
								SET @accion = 'DELETE';
								SET @user_name = IF(@user_name is null,SUBSTRING_INDEX(USER(),'@',1),@user_name);
								SET @dir_ip_cliente = IF(@dir_ip_cliente is null,SUBSTRING_INDEX(USER(),'@',-1),@dir_ip_cliente);
							INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'id_persona',
								registro_id = OLD.id_persona,
								val_old = OLD.id_persona,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nombre',
								registro_id = OLD.id_persona,
								val_old = OLD.nombre,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'apellido',
								registro_id = OLD.id_persona,
								val_old = OLD.apellido,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nrodoc',
								registro_id = OLD.id_persona,
								val_old = OLD.nrodoc,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'sexo',
								registro_id = OLD.id_persona,
								val_old = OLD.sexo,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'genero_autop',
								registro_id = OLD.id_persona,
								val_old = OLD.genero_autop,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'orientacion_sexual_id',
								registro_id = OLD.id_persona,
								val_old = OLD.orientacion_sexual_id,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;INSERT INTO suimvm_auditoria SET
								accion = @accion,
								tabla = 'persona',
								campo = 'nacionalidad',
								registro_id = OLD.id_persona,
								val_old = OLD.nacionalidad,
								val_new = NULL,
								usuario = @user_name,
								dir_ip = @dir_ip_cliente,
								marca =  @marca;
END;
$$
DELIMITER ;
