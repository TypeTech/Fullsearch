<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->text("detail");
            $table->integer("pricing")->nullable();
            $table->text("image");
            $table->text("condition")->nullable();
            $table->bigInteger("contact");
            $table->text("location");
            $table->boolean("status")->default(true);
            $table->timestampsTz();
        });
        DB::statement("ALTER TABLE services ADD COLUMN searchtext TSVECTOR");
        DB::statement("UPDATE services SET searchtext = to_tsvector('english', name || '' || detail)");
        DB::statement("CREATE INDEX searchtext_gin ON posts USING GIN(searchtext)");
        DB::statement("CREATE TRIGGER ts_searchtext BEFORE INSERT OR UPDATE ON posts FOR EACH ROW EXECUTE PROCEDURE tsvector_update_trigger('searchtext', 'pg_catalog.english', 'name', 'detail')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TRIGGER IF EXISTS tsvector_update_trigger ON services");
        DB::statement("DROP INDEX IF EXISTS searchtext_gin");
        DB::statement("ALTER TABLE services DROP COLUMN searchtext");
        Schema::dropIfExists('services');
    }
}
