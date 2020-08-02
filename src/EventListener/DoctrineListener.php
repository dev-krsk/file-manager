<?php

namespace Dev\Krsk\FileManager\EventListener;

use Dev\Krsk\FileManager\Entity\AbstractDirectory;
use Dev\Krsk\FileManager\Entity\AbstractFile;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Event\OnClassMetadataNotFoundEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * Класс DoctrineListener предназначен для подмены абстрактных классов бандла в аннотациях доктрины,
 * на классы, реализованные разработчиком в конечном продукте.
 *
 * @author Yuriy Yurinskiy <yuriyyurinskiy@yandex.ru>
 */
class DoctrineListener
{
    protected $resolveTargetEntities;

    /**
     * @param $fileRepository
     * @param $directoryRepository
     */
    public function __construct($fileRepository, $directoryRepository)
    {
        $mapping['targetEntity'] = ltrim($fileRepository, "\\");
        $this->resolveTargetEntities[ltrim(AbstractFile::class, "\\")] = $mapping;

        $mapping['targetEntity'] = ltrim($directoryRepository, "\\");
        $this->resolveTargetEntities[ltrim(AbstractDirectory::class, "\\")] = $mapping;
    }

    /**
     * @param LoadClassMetadataEventArgs $args
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $args): void
    {
        $cm = $args->getClassMetadata();

        foreach ($cm->associationMappings as $mapping) {
            if (isset($this->resolveTargetEntities[$mapping['targetEntity']])) {
                $this->remapAssociation($cm, $mapping);
            }
        }

        foreach ($this->resolveTargetEntities as $interface => $data) {
            if ($data['targetEntity'] == $cm->getName()) {
                $args->getEntityManager()->getMetadataFactory()->setMetadataFor($interface, $cm);
            }
        }
    }

    /**
     * @param OnClassMetadataNotFoundEventArgs $args
     */
    public function onClassMetadataNotFound(OnClassMetadataNotFoundEventArgs $args): void
    {
        if (array_key_exists($args->getClassName(), $this->resolveTargetEntities)) {
            $args->setFoundMetadata(
                $args
                    ->getObjectManager()
                    ->getClassMetadata($this->resolveTargetEntities[$args->getClassName()]['targetEntity'])
            );
        }
    }

    /**
     * @param \Doctrine\ORM\Mapping\ClassMetadataInfo $classMetadata
     * @param array                                   $mapping
     */
    private function remapAssociation($classMetadata, $mapping): void
    {
        $newMapping = $this->resolveTargetEntities[$mapping['targetEntity']];
        $newMapping = array_replace_recursive($mapping, $newMapping);
        $newMapping['fieldName'] = $mapping['fieldName'];

        unset($classMetadata->associationMappings[$mapping['fieldName']]);

        switch ($mapping['type']) {
            case ClassMetadata::MANY_TO_MANY:
                $classMetadata->mapManyToMany($newMapping);
                break;
            case ClassMetadata::MANY_TO_ONE:
                $classMetadata->mapManyToOne($newMapping);
                break;
            case ClassMetadata::ONE_TO_MANY:
                $classMetadata->mapOneToMany($newMapping);
                break;
            case ClassMetadata::ONE_TO_ONE:
                $classMetadata->mapOneToOne($newMapping);
                break;
        }
    }
}