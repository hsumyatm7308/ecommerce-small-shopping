<?php

class BaseTemplate
{
    protected $content;

    public function startSection($sectionName)
    {
        ob_start();
        $this->content[$sectionName] = '';
    }

    public function endSection($sectionName)
    {
        $this->content[$sectionName] = ob_get_clean();
    }

    public function yieldSection($sectionName)
    {
        echo $this->content[$sectionName];
    }

    public function render()
    {
        $this->yieldSection('content');
    }
}
?>