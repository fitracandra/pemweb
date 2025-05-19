    <?php

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
            Schema::table('transactions', function (Blueprint $table) {
                // Cek apakah kolom belum ada, lalu tambahkan product_id saja
                if (!Schema::hasColumn('transactions', 'product_id')) {
                    $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
                }
            });
        }
        public function down(): void
        {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropColumn('jumlah');
            });  
        }
    };
