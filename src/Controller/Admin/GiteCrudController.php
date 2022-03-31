<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Admin\field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;



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
        yield TextField::new('description')
            ->hideOnIndex();
        yield ImageField::new('image', 'Image')
            ->hideOnForm()
            ->setBasePath('/build/photos/upload/');
        yield VichImageField::new('imageFile', 'Image')->onlyOnForms()
        ->setDownloadUri('app.path.gite_images' . $this->getParameter('app.path.gite_images'))
        ->setImageUri($this->getParameter('app.path.gite_images'));
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
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders:
            //   %entity_name%, %entity_as_string%,
            //   %entity_id%, %entity_short_id%
            //   %entity_label_singular%, %entity_label_plural%
            ->setPageTitle('index', '%entity_label_plural% listing')

            // you can pass a PHP closure as the value of the title
            ->setPageTitle('new', 'Nouveau Gite')

            // in DETAIL and EDIT pages, the closure receives the current entity
            // as the first argument
            ->setPageTitle('detail', fn (Gite $gite) => (string) $gite)
            //->setPageTitle('edit' )

            // the help message displayed to end users (it can contain HTML tags)
            ->setHelp('edit', '...')
        ;
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions
        // ...
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
    ;
}
    
}