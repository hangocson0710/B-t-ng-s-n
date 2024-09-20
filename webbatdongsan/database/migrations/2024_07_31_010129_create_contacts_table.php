<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên người gửi liên hệ
            $table->string('email'); // Email người gửi liên hệ
            $table->text('message'); // Nội dung liên hệ
            $table->foreignId('classified_id')->constrained('classified'); // Tham chiếu tới bảng classified
            $table->timestamps(); // Tạo hai trường created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
