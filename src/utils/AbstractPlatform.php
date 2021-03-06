<?php
namespace utils;

use php\framework\Logger;
use Types\ProjectType;
use Types\RunType;
use Types\BuildType;

abstract class AbstractPlatform 
{
    private $buildTypes;
    private $runType;
    private $projectType;
    
    public function __construct()
    {
        $this->onRegister();
    }
    
    public function registerBuildType(BuildType $type)
    {
        if ($this->buildTypes[$type->getId()]) return;
        
        $this->buildTypes[$type->getId()] = $type;
    }
    
    public function registerRunType(RunType $type)
    {
        $this->runType = $type;
    }
    
    public function registerProjectType(ProjectType $type)
    {
        $this->projectType = $type;
    }
    
    public function getProjectType()
    {
        return $this->projectType;
    }
    
    public function getBuildType($id)
    {
        if (!$this->buildTypes[$id]) return;
        
        return $this->buildTypes[$id];
    }
    
    public function getAllBuildTypes()
    {
        return $this->buildTypes;
    }
    
    abstract function onRegister();
    
    public function getRunType()
    {
        return $this->runType;
    }
}