<?php

namespace Application\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use \Zend\InputFilter\InputFilter;
use Zend\Form\Element\Button;
use Zend\InputFilter\Input;


class CartorioFilter extends InputFilter
{

    public function __construct()
    {
        $arquivo = new Input('arquivo');
        $arquivo->setRequired(true)
            ->getFilterChain()
            ->attach(new StringTrim())
            ->attach(new StripTags())
            ->attachByName(
            'filerenameupload',
            array(
                'target'    => './public/uploads/',
                'randomize' => true,
            )
        );
        $this->add($arquivo);


        /**
         * Botão Submit
         */
         $button = new Button("Importar");
         $button->setLabel('Importar')
             ->setAttributes(array(
                'type'=>'submit',
                 'class'=>'btn'
             ));

         return $this;

        // $inputFilter->add($button);

        // $this->setInputFilter($inputFilter);
    }

}