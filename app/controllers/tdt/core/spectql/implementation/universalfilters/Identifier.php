<?php

namespace tdt\core\spectql\implementation\Universalfilters;

use tdt\core\spectql\implementation\universalfilters\CheckInFunction;
use tdt\core\spectql\implementation\universalfilters\Identifier;
use tdt\core\spectql\implementation\universalfilters\NormalFilterNode;
use tdt\core\spectql\implementation\universalfilters\UniversalFilterNode;

/**
 * Represents an identifier...
 *
 * ... of a Table, a Column or an Alias of one of the two.
 *
 * formats: (interpreted by the UniversalTableManager...)
 *   A) package.package.resource.restparam.restparam:subresource.subresource
 *       with:
 *          * packages: one or more,
 *          * restparams: optional,
 *          * subresources: optional
 *       (Please note the separators!)
 *
 *   B) alias.name_of_column
 *
 *
 */
class Identifier extends UniversalFilterNode {

    private $value; //type:String

    public function __construct($value) {
        parent::__construct("IDENTIFIER");
        $this->value = $value;
    }

    public function getIdentifierString() {
        return $this->value;
    }

}

