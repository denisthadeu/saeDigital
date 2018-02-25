# Candidato

**Nome**: Dênis Thadeu Leal Baptista

**E-mail**: denis.baptista91@gmail.com

# Instalação

Feito de forma estruturada, e por isso basta fazer os seguintes passos:

1 - Dar git pull no projeto
2 - configurar o arquivo connect.php informando usuário, senha e banco de dados
3 - Criar o schema do projeto com a seguinte query: CREATE SCHEMA NOME_BANCO_DADOS
4 - Cria as tabelas no banco de dados com as seguintes queries:
	4.1 - CREATE TABLE `espetaculos` ( `id` INT NOT NULL AUTO_INCREMENT, `nome` VARCHAR(45) NOT NULL, `qtd_poltronas` INT NOT NULL, PRIMARY KEY (`id`), UNIQUE INDEX `id_UNIQUE` (`id` ASC)); 
	4.2 - CREATE TABLE `reservas` ( `id` INT NOT NULL AUTO_INCREMENT, `id_espetaculo` INT NOT NULL, `cliente` VARCHAR(100) NOT NULL, `codigo_reserva` VARCHAR(10) NOT NULL, `status` INT NOT NULL DEFAULT 1, PRIMARY KEY (`id`), UNIQUE INDEX `idreservas_UNIQUE` (`id` ASC), INDEX `id_espetaculo_idx` (`id_espetaculo` ASC), CONSTRAINT `id_espetaculo` FOREIGN KEY (`id_espetaculo`) REFERENCES `espetaculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION);


# Observações

Versão do Apache: Apache/2.4.25 (Win64) 
Versão do PHP: 7.0.15

Caso queira uma massa de dados pronta, execute as linhas abaixo:

INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('1','A Mulher de Bath', '120');
INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('2','Romeu e Julieta 80', '100');
INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('3','Se Meu Apartamento Falasse...', '80');
INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('4','L, o Musical', '50');
INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('5','Hollywood', '70');
INSERT INTO `espetaculos` (id, nome, qtd_poltronas) VALUES ('6','A Visita da Velha Senhora', '102');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('2', 'Denis', '2746434717','1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('5', 'Milena', '4176798673', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('3', 'Angela', '2746434717', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('1', 'Pedro', '1037553982', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'João', '1979417568', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('2', 'Rita', '2196689805', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'Homer', '1804433080', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('2', 'Betina', '3867285129', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'Enzo', '2028372778', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('1', 'Valentina', '1420170480', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('2', 'Richard', '1304241585', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('1', 'Maria', '2616582860', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('3', 'Tereza', '1922451449', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('5', 'Robert', '1804433080', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('4', 'Michelly', '1644016235', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('2', 'Roberta', '1304241585', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('3', 'Ricardo', '3664772153', '0');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'Renato', '93419375', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('1', 'Dennis', '2196689805', '0');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'Luiz Ellison', '4288227272', '1');
INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva , status) VALUES ('6', 'Monica','3867285129','1');