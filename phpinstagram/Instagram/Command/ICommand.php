<?php

namespace phpinstagram\Instagram\Command;

interface ICommand {
    public function exec();

    public function setCommunication(\phpinstagram\Instagram\Client\Communication $communication);

    public function setParameter($name, $value);

    public function validate();

    public function dependsOn();
}