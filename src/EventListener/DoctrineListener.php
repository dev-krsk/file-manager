<?php


namespace Dev\Krsk\FileManager\EventListener;


use Dev\Krsk\FileManager\Entity\AbstractDirectory;
use Dev\Krsk\FileManager\Entity\DirectoryTrait;
use Dev\Krsk\FileManager\Entity\AbstractFile;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Event\OnClassMetadataNotFoundEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;

class DoctrineListener
{
    protected $resolveTargetEntities;

    /**
     * LoadMetadata constructor.
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

    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
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

    public function onClassMetadataNotFound(OnClassMetadataNotFoundEventArgs $args)
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
     *
     * @return void
     */
    private function remapAssociation($classMetadata, $mapping)
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