<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return <<<'SQL'
            CREATE VIEW users_view AS
                SELECT 
                    users.*,
                    group_name
                FROM users
                LEFT JOIN groups ON users.group_id=groups.id
            SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<'SQL'
            DROP VIEW IF EXISTS `users_view`;
            SQL;
    }
};
