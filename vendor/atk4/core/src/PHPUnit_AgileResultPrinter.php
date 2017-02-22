<?php

namespace atk4\core;

class PHPUnit_AgileResultPrinter extends \PHPUnit_TextUI_ResultPrinter
{
    protected function printDefectTrace(\PHPUnit_Framework_TestFailure $defect)
    {
        $e = $defect->thrownException();
        if (!$e instanceof \atk4\core\PHPUnit_AgileExceptionWrapper) {
            return parent::printDefectTrace($defect);
        }
        $this->write((string) $e);

        $p = $e->getPrevious();

        if (
            $p instanceof \atk4\core\Exception or
            $p instanceof \atk4\dsql\Exception) {
            $this->write($p->getColorfulText());
        }
    }
}
