<?php

namespace EscolaLms\Core\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

class EscolaMigration extends Migration
{
    protected function avoidDuplicateTable(string $table): void
    {
        if (Schema::hasTable($table)) {
            if (DB::table($table)->count() == 0) {
                $this->down();
            }
        }
    }

    public function create(string $table, \Closure $schema)
    {
        $this->avoidDuplicateTable($table);
        Schema::create($table, $schema);
    }

    public function down()
    {
        //
    }
}
