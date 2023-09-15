<?php

namespace App\Controller\Admin;

use App\Entity\Medias;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MediasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medias::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield ImageField::new('src')
            ->setUploadDir('public/uploads/catalogs/')
        ->setBasePath('/uploads/catalogs/');
        yield AssociationField::new('uploadedBy');
    }
}
