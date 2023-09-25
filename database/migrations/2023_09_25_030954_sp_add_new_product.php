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
    public function up(): void
    {
        $procedure = "CREATE PROCEDURE sp_add_new_product(
            in _code varchar(255),
            in _name varchar(255),
            in _price double(6,2),
            in _description varchar(255),
            in _width double(6,2),
            in _height double(6,2),
            in _isUpdate tinyint,
            in _id int
        )
        BEGIN
            IF(_isUpdate = 0) THEN
                INSERT INTO products
                    (code, name, price, description, width, height, img)
                VALUES
                    (_code, _name, _price, _description, _width, _height, 'image.jpg');
            ELSE
                UPDATE products SET
                    code = _code,
                    name = _name,
                    price = _price,
                    description = _description,
                    width = _width,
                    height = _height
                WHERE
                    id = _id; 
            END IF;
            SELECT 'Se ha registrado el nuevo producto' message;
        END;";
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_add_new_product');
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
