<?php

namespace Kanboard\Plugin\gecos;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('template:layout:css', array('template' => 'plugins/gecos/Asset/style.css'));
        $this->hook->on('template:layout:js', array('template' => 'plugins/gecos/Asset/script.js'));
        $this->template->hook->attach('template:task:show:top', 'gecos:task-top');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'Modal Task View';
    }

    public function getPluginDescription()
    {
        return t('description');
    }

    public function getPluginAuthor()
    {
        return 'laimeilleurzamis';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return '';
    }
}

