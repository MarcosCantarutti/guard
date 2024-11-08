<?php
// representação de 1 registro no DB em forma de classe
namespace App\Models;

use Core\Database;

class Contato
{
    public $id;
    public $usuario_id;
    public $nome;
    public $observacao;
    public $telefone;
    public $email;
    public $avatar;
    public $data_criacao;





    public function contato()
    {
        $DadosContato = [];
        if (session()->get('mostrar')) {
            $DadosContato[] = decrypt($this->observacao);
            $DadosContato[] = decrypt($this->telefone);
            $DadosContato[] = decrypt($this->email);
            return $DadosContato;
        }

        return  $DadosContato = ['***********', '***********', '***********'];;
    }

    public static function all($filter = null)
    {
        $database = new Database(config('database'));
        $contatos = $database->query(
            query: "SELECT * FROM contatos WHERE usuario_id = :usuario_id " . (
                $filter ? ' and NOME like :filter ' : null
            ),
            class: self::class,
            params: array_merge(
                ['usuario_id' => auth()->id],
                $filter ? ['filter' => "%$filter%"] : []
            )
        )->fetchAll();

        return  $contatos;
    }

    public static function create($usuario_id, $nome, $observacao, $telefone, $email, $avatar)
    {
        $database = new Database(config('database'));

        $database->query(
            query: "INSERT INTO contatos (usuario_id, nome, observacao, telefone, email, avatar, data_criacao) VALUES (:usuario_id, :nome, :observacao, :telefone, :email, :avatar, :data_criacao)",
            params: [
                'usuario_id' => $usuario_id,
                'nome' => $nome,
                'observacao' => $observacao,
                'telefone' => $telefone,
                'email' => $email,
                'avatar' => $avatar,
                'data_criacao' => date('Y-m-d H:i:s'),
            ]
        );
    }


    public static function delete($id)
    {
        $database = new Database(config('database'));

        $database->query(
            query: "DELETE FROM contatos where id = :id",
            params: [
                'id' => $id
            ]
        );
    }

    public static function update($id, $nome, $observacao, $telefone, $email, $avatar)
    {
        $database = new Database(config('database'));

        $set = 'SET nome = :nome';

        if ($observacao) {
            $set .= ', observacao = :observacao';
        }
        if ($telefone) {
            $set .= ', telefone = :telefone';
        }
        if ($email) {
            $set .= ', email = :email';
        }
        if ($avatar) {
            $set .= ', avatar = :avatar';
        }

        $params = array_merge(
            ['nome' => $nome, 'id' => $id],
            $observacao ? ['observacao' => $observacao] : [],
            $telefone ? ['telefone' => $telefone] : [],
            $email ? ['email' => $email] : [],
            $avatar ? ['avatar' => $avatar] : []
        );

        $database->query(
            query: "UPDATE contatos $set WHERE id = :id",
            params: $params
        );
    }
}
