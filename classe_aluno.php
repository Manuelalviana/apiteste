<?php
Class Aluno{

    //conexao do banco de dados
    private $pdo;
    public function_construct($dbname, $host, $user,$senha, $cpf , $data_nasc,  $periodo, $CursoTipo );

    {
        thy {
            $this-> pdo = new PDO("Mysql:dbname=" .$dbname .";host" .$host, $user, $senha, $data_nasc, $periodo, $CursoTipo);
        } 
        catch (PDOException $e){
            echo "Erro: Conexao perdida do dados" .$e->getMessage ();
            exit();
        }
        catch (Exception $){
        echo "Erro Generico: " .$e->getMessage() ;
        exit();
    }
    }
//// buscar os dados do banco e por em "seu cadastos"
    public function buscarDados()
    [
        $res = Array();
        $cmd = $this ->pdo->query("SELECT * FROM aluno ORDER BY name");
        $res = $cmd-> fetchAll(PDO:: FETCH_ASSOC);
        return $res; 
    ]


// cadastrar
        
    public function CadastrarPessoa($nome, $data_nasc, $email, $senha $adreess, $contato,, $periodo $modalidade)

    // Antes de cadastrar verificar com if


    //email ja cadastrado?
    {
        $cnd =$this->pdo->prepare("SELECT id from aluno WHERE email = :e");
        cmd->blindValue(":e", $email);
        cmd->execute();
        if($cmd-> rowCount()>0) //ja existe
        {
            result false
        }else //nao foi encontrado
        {
            $cmd = $this-> pdo-> prepare("INSERT INFO aluno (nome, contato, cpf, adreess, email, data_nasc, modalidade, periodo )VALUE(:n, :c, :e)" );
            $cmd->blindValue(":n", $nome);
            $cmd->blindValue(":c", $contato);
            $cmd->blindValue(":cpf", $cpf);
            $cmd->blindValue(":adreess", $adreess);
            $cmd->blindValue(":dn", $data_nasc);
            $cmd->blindValue(":p" $periodo);
            $cmd->blindValue(":curst", $CursoTipo);
            return true;
        }

    }
    // aluno menor de idade
    {
        $cnd =$this->pdo->prepare("SELECT id from aluno WHERE data_nasc = :d");
        // fetch the current date (minus 18 years)
          $Verifica['Dia'] = date('d');
          $Verifica['Mes'] = date('m');
          $Verifica['Ano'] = date('Y') - 18;
          
          $Hoje = mktime(0, 0, 0, $Verifica['Dia'], $Verifica['Mes'], $Verifica['Ano']);
        
          if ($data_nasc < $Hoje) { 
            echo 'Usuário Menor de 18 anos';

          } else {
            $cmd = $this-> pdo-> prepare("INSERT INFO aluno (nome, contato, cpf, adreess, email, data_nasc, modalidade, periodo )VALUE(:n, :c, :e)" );
            $cmd->blindValue(":n", $nome);
            $cmd->blindValue(":c", $contato);
            $cmd->blindValue(":cpf", $cpf);
            $cmd->blindValue(":adreess", $adreess);
            $cmd->blindValue(":dn", $data_nasc);
            $cmd->blindValue(":p" $periodo);
            $cmd->blindValue(":curst", $CursoTipo);
            return true;
          }

    }
    public function excluirCadastro($id)
    {
        $cmd = $this->pdo-> prepare("DELETE FROM aluno WHERE id = :id");
        $cmd ->bindValue(":id, $id");
        $cmd-> executar();
    }

// buscar os dados da pessoa
    public function buscarDadosAluno($id)
    {
        $res= array();
        $cmd = $this-> pdo-> prepare(" SELECT * FROM pessoa WHERE 
            id= :id");
        $cmd-> bindValue(":id, $id");
        $cmd-> execute();
        res = $cmd->fetch(PDO::FETCH_ASSOC); 
        return $res;

    }


// Atualizar os dados no banco de dados
    public function Atualizardados()
    {

    }

}


?>