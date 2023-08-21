<?php

    use App\Models\Permission;
    use App\Models\User;
    use App\Models\UserPermission;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
    {
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('username')->unique();
                $table->string('email')->nullable()->unique();
                $table->string('language')->default('de');
                $table->string('jabber_id')->unique();
                $table->decimal('balance_in_cent')->default(0);
                $table->integer('newsletter_enabled')->default(0);
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('users');
        }
    }
