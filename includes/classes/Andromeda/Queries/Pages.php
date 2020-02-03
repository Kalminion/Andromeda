<?php

namespace Andromeda\Queries;

use Andromeda\Queries\Classes;

class Pages extends Queries
{
    private function getCount() {
        $this->count();
        return json_decode($this->result());
    }

    public function request()
    {
        if ($this->getCount() > 0) {
            $this->all();
        } else {
            $this->parse(array('No content found'));
        }
    }

    public function find($id) {
        $this->get($id);
    }
}