<?php

namespace App\Controller\Admin;

use App\Entity\ContactDisponibilite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ContactDisponibiliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactDisponibilite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield IdField::new('id')->onlyOnIndex();
        yield AssociationField::new('contactId');
        yield ChoiceField::new('jour')->setChoices(['Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi'=>'Jeudi', 'Vendredi'=>'Vendredi', 'Samedi'=>'Samedi', 'Dimanche'=>'Dimanche']);
        yield TimeField::new('heureDebut');
        yield TimeField::new('heureFin');
        

        
    }
    
}