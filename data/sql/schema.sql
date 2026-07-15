CREATE TABLE cita (id BIGINT AUTO_INCREMENT, paciente_id BIGINT NOT NULL, doctor_id BIGINT NOT NULL, fecha DATE NOT NULL, hora TIME NOT NULL, motivo VARCHAR(255), estado VARCHAR(20) DEFAULT 'pendiente', INDEX paciente_id_idx (paciente_id), INDEX doctor_id_idx (doctor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE doctor (id BIGINT AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, apellido VARCHAR(100) NOT NULL, especialidad VARCHAR(100) NOT NULL, telefono VARCHAR(20), email VARCHAR(150), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE paciente (id BIGINT AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, apellido VARCHAR(100) NOT NULL, documento VARCHAR(20) NOT NULL UNIQUE, telefono VARCHAR(20), email VARCHAR(150), fecha_nacimiento DATE, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE cita ADD CONSTRAINT cita_paciente_id_paciente_id FOREIGN KEY (paciente_id) REFERENCES paciente(id);
ALTER TABLE cita ADD CONSTRAINT cita_doctor_id_doctor_id FOREIGN KEY (doctor_id) REFERENCES doctor(id);
