<?php

namespace tdt\core\spectql\implementation\interpreter\executers\implementations;

use tdt\core\spectql\implementation\interpreter\executers\implementations\UnaryFunctionExecuter;
use tdt\core\spectql\implementation\interpreter\executers\tools\ExecuterDateTimeTools;
use tdt\core\spectql\implementation\interpreter\UniversalInterpreter;

/* isnull */
class UnaryFunctionIsNullExecuter extends UnaryFunctionExecuter {
    public function getName($name) {
        return "isnull_" . $name;
    }
    public function doUnaryFunction($value) {
        return (is_null($value) ? "true" : "false");
    }
}
