<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers {

    public function exec() {
        $userId;
        $missingAttribute;
        $response = [
            'success' => true
        ];

        try {
            $requestsVariables = $this->processServerElements->getVariables();

            if ((!$requestsVariables) || (sizeof($requestsVariables) === 0)) {
                $missingAttribute = 'variableIsEmpty';
                throw new \Exception("You need to insert variables in url");
            }

            foreach ($requestsVariables as $requestVariable) {
                if ($requestVariable['name']  === 'userId') {
                    $userId = $requestVariable['value'];
                }
            }

            if (!$userId) {
                $missingAttribute = 'userIdIsNull';
                throw new \Exception("You need to inform userId variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")
                ->fetchAll();

            if (sizeof($users) === 0) {
                $missingAttribute = 'thisUserNoExist';
                throw new \Exception("There is not record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();

            if ((!$params) || sizeof($params) === 0) {
                $missingAttribute = 'paramsNotExist';
                throw new \Exception("You have to inform the params attr to update");
            }

            $updateStructureQuery = '';


            foreach ($params as $key => $value) {
                if (!in_array($key,['name','last_name','age'])) {
                    $missingAttribute = "keyNotAcceptable";
                    throw new \Exception($key);
                }

                if ($key === 'name') {
                    $updateStructureQuery .= "name = :name,";//pega a query e concatena com ela mesma. Forma la no postman
                    $toStatement[':name'] = $value;
                }

                if ($key === 'last_name') {
                    $updateStructureQuery .= " last_name = :last_name,";
                    $toStatement[':last_name'] = $value;
                }

                if ($key === 'age') {
                    $updateStructureQuery .= "age = :age,";
                    $toStatement[':age'] = $value;
                }

            }

            //no final sempre sobra uma virgula

            $newStringElementsSQL = substr($updateStructureQuery,0,-1);//marca onde começa e até onde vai. no caso -1 representa o ultimo caractere

            /*$updateStringInArray = str_split($updateStructureQuery);//updateStructureQuery: retorna uma String, str_split pega a string e quebra num array de mini strings, onde cada letra é uma string
            
            array_pop($updateStringInArray);//array_pop: remove a ultima posicao do array, que no caso é a virgula

            $newStringElementsSQL = implode($updateStringInArray);// implode: junta tud de volta*/

            $sql = "UPDATE 
                        user 
                    SET
                        {$newStringElementsSQL}
                    WHERE
                        id_user = {$userId}
                    ";

            $statement = $this->pdo->prepare($sql);//pdo vem da abstract controller. la se inicia o pdo passando uma String de configuração apr ao banco de dados
            
            $statement->execute($toStatement);

            
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }

        view($response);
    }
}