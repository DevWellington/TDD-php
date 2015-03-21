<?php

namespace DevWellington\Validator;

class ProdutoFormValidator extends AbstractFormValidator
{
    /**
     * @var array
     */
    private $invalidFields = array();

    /**
     * @param $data
     * @return bool|void
     */
    public function validate($data)
    {
        parent::validate($data);

        $arrayValidate = array();

        $nomeIsValid = (
            ( ! isset($data['nome'])) ||
            ($data['nome'] == '') ||
            ($data['nome'] == NULL)
        ) ? true : false;

        $arrayValidate['nome'] = ($nomeIsValid) ? 'Campo [Nome] nao foi preenchido.' : true;
        $arrayValidate['valor'] = (! is_numeric($data['valor'])) ? 'Campo [Valor] nao eh numerico.' : true;
        $arrayValidate['descricao'] = (strlen($data['descricao']) > 200) ? 'Campo [Descricao] contem mais que 200 caracteres' : true;

        foreach ($arrayValidate as $k => $v) {
            if ($v !== true)
                $this->invalidFields[$k] = $v;
        }

        if (! count($this->invalidFields) > 0)
            return true;

        return false;
    }

    /**
     * @return array
     */
    public function getInvalidFields()
    {
        return $this->invalidFields;
    }

}