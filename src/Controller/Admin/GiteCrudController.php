<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Admin\field\VichImageField;


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
        yield TextField::new('description')->onlyOnDetail()->onlyOnForms();
        yield ImageField::new('image', 'Image')
            ->onlyOnIndex()
            ->setBasePath('/build/photos/upload/');
        yield VichImageField::new('imageFile', 'Image')->onlyOnForms()
        ->setDownloadUri('app.path.gite_images' . $this->getParameter('app.path.gite_images'))
        ->setImageUri($this->getParameter('app.path.gite_images'))->setRequired(true);
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