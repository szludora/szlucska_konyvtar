<?php

use App\Models\Lending;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->primary(['user_id', 'copy_id', 'start']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('copy_id')->references('copy_id')->on('copies');
            $table->String('extension')->default('NONE');
            $table->date('start')->default(now());
            // $table->date('start')->default(getdate());
            $table->timestamps();
        });

        Lending::create([
            'user_id' => '2',
            'copy_id' => '1',
            'start' => '2024.01.24.',
            'extension' => 'pdf',
            'date' => '2024.01.24'
        ]);

        Lending::create([
            'user_id' => '2',
            'copy_id' => '2',
            'start' => '2024.01.24.',
            'extension' => 'pdf',
            'date' => '2024.01.24'
        ]);

        Lending::create([
            'user_id' => '2',
            'copy_id' => '3',
            'start' => '2024.01.24.',
            'extension' => 'pdf',
            'date' => '2024.01.24'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lendings');
    }
};
