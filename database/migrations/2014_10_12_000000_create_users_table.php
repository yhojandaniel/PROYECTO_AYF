<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Estructura de la tabla de USUARIOS
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                                                  // Id de usuario por defecto como en la base de datos
            $table->string('name');                                                        // String para nombre
            $table->string('lastname');                                                    // String para apellidos
            $table->string('email')->unique();                                             // String único para email
            $table->string('phone');                                                       // String para guardar el número (menos memoria que integer)
            $table->string('password');                                                    // String para guardar hashes en la base de datos
            $table->enum('rol', ['usuario','trabajador', 'gerente'])->default('usuario');  // Enum para tener solo 3 opciones en el campo de rol (Laravel lo trata como String)
            $table->timestamps();                                                          // Campos de creacion y actualizacion (tipo de dato: fecha)
        });

        // Estructura de la tabla de PROOVEDORES
        Schema::create('providers', function (Blueprint $table) {
            $table->id();                 // Id de Proovedor
            $table->string('name');       // Nombre del proovedor
            $table->string('category');   // Categoria del proovedor
            $table->timestamps();         // Campos de creacion y actualizacion
        });

        // Estructura de la tabla de MATERIA PRIMA
        Schema::create('raw-material', function (Blueprint $table) {
            $table->id();                                                       // Id de la materia prima
            $table->string('name');                                             // Nombre de la materia prima
            $table->unsignedBigInteger('provider-id');                          // Id del proovedor de la materia prima
            $table->foreign('provider-id')->references('id')->on('providers');  // Referencia de la llave foránea (Id de proovedor)
            $table->timestamps();                                               // Campos de creacion y actualizacion
        });

        // Estructura de la tabla de PRODUCTOS (venta al consumidor)
        Schema::create('products', function (Blueprint $table) {
            $table->id();                   // Id de producto
            $table->string('name');         // String para Nombre del producto
            $table->string('description');  // String para Breve descripcion
            $table->integer('stock');       // Integer para el stock
            $table->float('price');         // Float para el precio
            $table->timestamps();           // Campos de creacion y actualizacion
        });

         // INTERMEDIARIO ENTRE MATERIA PRIMA Y PRODUCTOS (CONVENCION PARA LA NORMALIZACION DE LA BASE DE DATOS)
         // Con esto identificamos las materias primas asociadas a un producto, y por ende, los proovedores asociados al producto

         Schema::create('raw-material-products', function (Blueprint $table) {
            $table->unsignedBigInteger('raw-material-id');                            // Id de la materia prima del producto
            $table->foreign('raw-material-id')->references('id')->on('raw-material'); // Referencia de la llave foránea (materia prima)
            $table->unsignedBigInteger('product-id');                                 // Id del Producto
            $table->foreign('product-id')->references('id')->on('products');          // Referencia de la llave foránea (productos)
            $table->timestamps();                                                     // Campos de creacion y actualizacion
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Baja todas las tablas de dla base de datos
        Schema::dropIfExists('users');
        Schema::dropIfExists('providers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('raw-material-products');
    }
}
