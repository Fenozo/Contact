<?php

namespace App\Helpers\FormHelper;

class Form 
{
    protected $form;
    protected $data;
    protected $config;
    protected $type ='text';

    public function __construct($data = [], $config = [])
    {
        $this->data = $data;
        $this->config = $config;
    }

    public function start( $endpoint='', $method="post" )
    {
        $this->form = '';
        $this->form = '<form  method="'.$method.'" action="'.$endpoint.'">';
        return $this->form .= ''.csrf_field();
    }

    public function end() 
    {
        $this->form = '';
        return $this->form = '</form>';
    }

    public function input( $key = null, $label = null, $value = null)
    {
        $this->form = '';
        if ($this->getType() != 'hidden') {
            $this->form .= '<div class="form-group">';
            $this->form .= '<label for="">'.$this->getLabel($key, $label).'</label>';
        }
        
        $this->form .= '<input class="form-control" type="'.$this->getType().'" name="'.$this->inputName($key).'" value="'.$this->inputValue($key, $value).'">';
        if ($this->getType() != 'hidden') {
            
            $this->form .= '</div>';
        }
        return $this->form;
    }

    public function inputValue($key, $value =null)
    {
        if ($value !== null) {
            return $value;
        }

        if (is_object($this->data)) {
            // si la clé est bien dans la liste des attribut de l'objet
            if (in_array($key , \get_object_vars($this->data))) {
                return $this->data->{$key} ;
            }
        }

        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
    /**
     * Permet d'afficher le name du formulaire
     */
    public function inputName($key)
    {
        if (empty($this->config)) {
            return $key;
        }

        $prefix = $this->has('prefix', $this->config);

        if ($prefix === null) {
            return $key;
        }
       
        return $prefix.'['.$key.']';
    }

    protected function has ($key, $array)
    {
        return isset($array[$key]) && $array[$key] != '' ? $array[$key] : null;
    }

    public function getLabel($key, $label)
    {
        if ($label == null) {
            return \ucfirst($key);
        }
        return \ucfirst($label);
    }

    public function getOtherFields()
    {
        $others = $this->has('fields', $this->config);
        $input = '';

        if (count($others) < 0) {
            return;
        }

        foreach ($others as $key => $field) {
            $name = $this->has('name', $field);
            $value = $this->has('value', $field);
            $this->setType($this->has('type', $field));
            $input .= $this->input($name, null , $value);
            $this->setType('text');
        }

        return $input;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}