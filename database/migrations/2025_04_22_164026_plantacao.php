<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('platacoes', function (Blueprint $table) {
            $table->id('id_platacoes');
            $table->string('nome', 45);
            $table->unsignedBigInteger('plantacoes_users');
            $table->decimal('lucro', 9, 2);
            $table->tinyInteger('status');
            $table->decimal('custo_producao', 10, 2);
            $table->timestamps();

            $table->foreign('plantacoes_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('platacoes');
    }
};
