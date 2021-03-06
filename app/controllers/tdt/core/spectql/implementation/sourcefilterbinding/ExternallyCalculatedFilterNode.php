<?php

/**
 * This file represents a part of the UniversalFilterTree that is calculated externally.
 *
 * @package The-Datatank/universalfilter
 * @copyright (C) 2012 by iRail vzw/asbl
 * @license AGPLv3
 * @author Jeroen Penninck
 */

namespace tdt\core\spectql\implementation\sourcefilterbinding;

use tdt\core\spectql\implementation\data\UniversalFilterTable;
use tdt\core\spectql\implementation\universalfilters\NormalFilterNode;
use tdt\core\spectql\implementation\universalfilters\UniversalFilterNode;

class ExternallyCalculatedFilterNode extends NormalFilterNode {

    private $table;

    public function __construct(UniversalFilterTable $table, UniversalFilterNode $implementedFilter) {
        parent::__construct("EXTERNALLY_CALCULATED_NODE");
        $this->table = $table;
        if ($implementedFilter != null)
            $this->setSource($implementedFilter);
    }

    public function getTable() {
        return $this->table;
    }

}