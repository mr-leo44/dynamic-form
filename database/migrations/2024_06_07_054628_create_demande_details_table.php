<?php

use App\Models\Demande;
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
        Schema::create('demande_details', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('qte_demandee');
            $table->string('qte_livree');
            $table->foreignIdFor(Demande::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_details');
    }
};
