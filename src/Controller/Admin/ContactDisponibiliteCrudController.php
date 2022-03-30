<?php

namespace App\Controller\Admin;

use App\Entity\ContactDisponibilite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactDisponibiliteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactDisponibilite::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
