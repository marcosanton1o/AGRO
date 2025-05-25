<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('plantacoes', function (Blueprint $table) {
            $table->id('id_plantacao');
            $table->string('nome', 45);
            $table->decimal('lucro', 9, 2);
            $table->Integer('status')->default(3);
            $table->decimal('custo_producao', 10, 2);
            $table->timestamps();

            $table->foreignId('plantacoes_users')->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('platacoes');
    }
};
