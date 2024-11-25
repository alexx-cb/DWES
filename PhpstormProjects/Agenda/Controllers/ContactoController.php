<?php 
namespace Controllers;
use Models\Contacto;

class ContactoController{
    private Contacto $contact;

    function __construct() {
        $this->contact = new Contacto();
    }

    public function mostrarTodos(){
        $todos_mis_contactos = $this->contact->getAll();
        require_once 'PhpstormProjects/Agenda/Views/contacto/mostrar_todos.php';
    }
}



?>