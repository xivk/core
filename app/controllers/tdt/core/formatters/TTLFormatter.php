<?php

namespace tdt\core\formatters;

/**
 * This file contains the RDF/Turtle formatter.
 *
 * Includes RDF Api for PHP <http://www4.wiwiss.fu-berlin.de/bizer/rdfapi/>
 * Licensed under LGPL <http://www.gnu.org/licenses/lgpl.html>
 *
 * @copyright (C) 2011,2013 by OKFN Belgium vzw/asbl
 * @license AGPLv3
 * @author Michiel Vancoillie <michiel@okfn.be>
 * @author Miel Vander Sande
 */
class TTLFormatter implements IFormatter{

    public static function createResponse($dataObj){

        // Create response
        $response = \Response::make(self::getBody($dataObj), 200);

        // Set headers
        $response->header('Content-Type', 'text/turtle; charset=UTF-8');

        return $response;
    }

    public static function getBody($dataObj){

        if($dataObj->is_semantic){

            // Check if a configuration is given
            $conf = array();
            if(!empty($dataObj->semantic->conf)){
                $conf = $dataObj->semantic->conf;
            }

            // Serializer instantiation
            $ser = \ARC2::getTurtleSerializer($conf);

            // Serialize a triples array
            return $ser->getSerializedTriples($dataObj->data->getTriples());

        }

        \App::abort(400, "This resource doesn't contain semantic (graph) data, a Turtle serialization cannot be provided.");

    }

    public static function getDocumentation(){
        return "Prints the Turtle notation with semantic annotations";
    }

}
