<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class GiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield IdField::new('id')->onlyOnIndex();
        yield 'titre';
        yield 'description';
        yield 'image';
        yield AssociationField::new('contactId');
        yield 'animaux';
        yield 'animauxPrix';
        yield 'tarifHauteSaison';
        yield 'tarifBasseSaison';
        yield 'emplacement';
        yield 'surface';
        yield 'nombreDeCouchages';
        yield 'nombreDeChambres';
        
    }
    
}