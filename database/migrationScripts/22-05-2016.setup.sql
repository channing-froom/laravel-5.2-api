DROP TABLE IF EXISTS application_logs;
DROP TABLE IF EXISTS application_log_types;
DROP TABLE IF EXISTS oauth;
DROP TABLE IF EXISTS application_types;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user_types;
DROP TABLE IF EXISTS locations;
DROP TABLE IF EXISTS location_types;

CREATE TABLE user_types (
  id SMALLINT NOT NULL AUTO_INCREMENT,
  label VARCHAR(120) NOT NULL,
  slug VARCHAR(80) NOT NULL,
  description VARCHAR(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_types VALUES
(1, 'Administrator', 'administrator', 'Administrator'),
(2, 'Client', 'client', 'Client'),
(3, 'User', 'user', 'User');

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  user_type_id SMALLINT NOT NULL,
  first_name VARCHAR(120) NOT NULL,
  last_name VARCHAR(120) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  remember_token VARCHAR(100),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_user_user_type_id FOREIGN KEY (user_type_id) REFERENCES user_types (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE application_types (
  id SMALLINT NOT NULL AUTO_INCREMENT,
  label VARCHAR(120) NOT NULL,
  slug VARCHAR(80) NOT NULL,
  description VARCHAR(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO application_types VALUES
(1, 'Android', 'android', 'Android'),
(2, 'IOS', 'ios', 'IOS'),
(3, 'Web', 'web', 'Web');

CREATE TABLE oauth (
  id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  application_type_id SMALLINT NOT NULL,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_oauth_user_id FOREIGN KEY (user_id) REFERENCES users (id),
  CONSTRAINT fk_oauth_application_type_id FOREIGN KEY (application_type_id) REFERENCES application_types (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE location_types (
  id INT NOT NULL AUTO_INCREMENT,
  label VARCHAR(120) NOT NULL,
  slug VARCHAR(80) NOT NULL,
  description VARCHAR(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO location_types (label, slug, description) VALUES
('Company', 'company', 'Company'),
('House', 'house', 'House'),
('Hospital', 'hospital', 'Hospital');

CREATE TABLE locations (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  address TEXT NOT NULL,
  description VARCHAR(255),
  latitude VARCHAR(255),
  longitude VARCHAR(255),
  location_type_id INT NOT NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_locations_location_type_id FOREIGN KEY (location_type_id) REFERENCES location_types (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE application_log_types (
  id SMALLINT NOT NULL AUTO_INCREMENT,
  label VARCHAR(120) NOT NULL,
  slug VARCHAR(80) NOT NULL,
  description VARCHAR(255),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO application_log_types VALUES
(1, 'Undefined', 'undefined', 'Undefined'),
(2, 'Error', 'error', 'Error'),
(3, 'Warning', 'warning', 'Warning'),
(4, 'Event', 'event', 'Event'),
(5, 'Login', 'login', 'Login');

CREATE TABLE application_logs (
  id INT NOT NULL AUTO_INCREMENT,
  log TEXT NOT NULL,
  user_id INT,
  application_type_id SMALLINT,
  application_log_id SMALLINT NOT NULL,
  created_at TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_application_logs_user_id FOREIGN KEY (user_id) REFERENCES users (id),
  CONSTRAINT fk_application_logs_application_type_id FOREIGN KEY (application_type_id) REFERENCES application_types (id),
  CONSTRAINT fk_application_logs_application_log_id FOREIGN KEY (application_log_id) REFERENCES application_log_types (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;