<?php

namespace Application\Controller;

use Application\Model\CategoryModel;
use Aura\Di\Exception;
use DevWellington\HTML\Components\Button;
use DevWellington\HTML\Components\FieldSet;
use DevWellington\HTML\Components\Option;
use DevWellington\HTML\Components\Input;
use DevWellington\HTML\Components\Label;
use DevWellington\HTML\Components\Select;
use DevWellington\HTML\Components\Form;

class ProdutoController implements IController
{
    /**
     * @var \DevWellington\HTML\Components\Form $form
     */
    private $form;

    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function indexAction()
    {
        $this->createForm();
        $this->populate();

        return $this->form;
    }

    private function getData()
    {
        return [
            'nome' => 'Mouse USB',
            'valor' => 'R$ 40,00',
            'descricao' => 'Mouse USB marca Logitech',
            'categoria' => 2
        ];
    }

    private function populate()
    {
        $arrayData = $this->getData();

        foreach ($this->form->getComponents() as $components)
            if ($components instanceof \DevWellington\HTML\Components\FieldSet)
                foreach ($components->getComponents() as $component) {
                    if ($component instanceof \DevWellington\HTML\Components\Input)
                        foreach ($arrayData as $k => $v)
                            if (preg_match("/{$k}/", $component->getAttributes()))
                                $component->setValue($arrayData[$k]);

                    if ($component instanceof \DevWellington\HTML\Components\Select)
                        foreach ($component->getOptions() as $option)
                            foreach ($arrayData as $k => $v)
                                if ($k == "categoria" and $option->getValue() == $v)
                                    $option->setSelected(true);

                }

    }

    private function createForm()
    {
        $inputNome = new Input();
        $inputNome
            ->setType('text')
            ->setAttribute('name', 'nome')
        ;
        $labelNome = new Label('Nome: ', 'nome');


        $fieldsetNome = new FieldSet();
        $fieldsetNome
            ->add($labelNome)
            ->add($inputNome)
        ;


        $inputValor = new Input();
        $inputValor
            ->setType('text')
            ->setAttribute('name', 'valor')
        ;

        $labelValor = new Label('Valor: ', 'valor');

        $fieldsetValor = new FieldSet();
        $fieldsetValor
            ->add($labelValor)
            ->add($inputValor)
        ;


        $inputDescricao = new Input();
        $inputDescricao
            ->setType('text')
            ->setAttribute('name', 'descricao')
        ;

        $labelDescricao = new Label('Descricao: ', 'descricao');

        $fieldsetDescricao = new FieldSet();
        $fieldsetDescricao
            ->add($labelDescricao)
            ->add($inputDescricao)
        ;

        $labelValor = new Label('Categoria: ', 'categoria');

        $select = new Select();
        $select->setAttribute('name', 'select-name');

        $select->setOptions($this->getOptionsCategory());

        $fieldsetSelect = new FieldSet();
        $fieldsetSelect
            ->add($labelValor)
            ->add($select)
        ;

        $button = new Button();
        $button
            ->setAttribute('name', 'button-salvar')
            ->setText('Botao salvar')
        ;

        $this->form = new Form();
        $this->form
            ->setName('form-dinamico')
            ->setAction('./salvar')
            ->setMethod('POST')
            ->add($fieldsetNome)
            ->add($fieldsetValor)
            ->add($fieldsetDescricao)
            ->add($fieldsetSelect)
            ->add($button)
        ;

    }

//    public function salvarAction()
//    {
//        echo "Erro ao salvar";
//        return false;
//    }

    /**
     * @return array
     */
    private function getOptionsCategory()
    {
        $mdl = new CategoryModel($this->pdo);
        $data = $mdl->getData();

        $options=[];
        foreach ($data as $key=>$d){
            $options[] = new Option($d['id'], $d['description']);
        }

        return $options;
    }

}