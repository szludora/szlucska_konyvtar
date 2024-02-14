<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     DB::unprepared('CREATE TRIGGER fromStoreLaravel AFTER INSERT ON lendings
    //     FOR EACH ROW
    //     BEGIN
    //     UPDATE copies SET status = 1 WHERE copy_id = NEW.copy_id;
    //     END');
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS fromStoreLaravel");
    }
};
