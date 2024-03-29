<?php
    class User extends Conn {
        //Atributos da classe
        public object $conn;
        public array $formData;
        public int $id;

        public function list() :array {
            $this->conn = $this->conectar();
            $query = "SELECT u.* FROM categorias u ORDER BY nome_categoria";
            $result = $this->conn->prepare($query);
            $result->execute();
            $retorno = $result->fetchAll();
            //var_dump($retorno);
            return $retorno;
        }

        //Só colocar a tipagem "bool", se no servidor tiver o php 8, caso contrario nao coloca.
        public function insert(): bool {
            $this->conn = $this->conectar();
            $query = "INSERT INTO categorias (nome_categoria) VALUES (:nome_categoria)";
            $add_user = $this->conn->prepare($query);
            $add_user->bindParam(':nome_categoria', $this->formData['nome_categoria']);
            $add_user->execute();

            if ($add_user->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function view() {
            $this->conn = $this->conectar();
            $query = "SELECT * FROM categorias WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $this->id);
            $result->execute();
            $retorno = $result->fetch();
            return $retorno;
        }

        public function edit() : bool {
            $this->conn = $this->conectar();
            $query = "UPDATE categorias SET nome_categoria = :nome_categoria WHERE id = :id";
            $result = $this->conn->prepare($query);
            $result->bindParam(':nome_categoria', $this->formData['nome_categoria']);
            $result->bindParam(':id', $this->formData['id']);
            $result->execute();

            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function delete() : bool{
            $this->conn = $this->conectar();
            $query = "DELETE FROM categorias WHERE id = :id LIMIT 1";
            $result = $this->conn->prepare($query);
            $result->bindParam(':id', $this->id);
            $value = $result->execute();
            return $value;
        }
    }