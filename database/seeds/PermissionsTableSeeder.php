<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create permisions for each CRUD - One permision for create, one for edit, one for delete, one for list, one for show

        //Crear, leer,modificar,eliminar, listar


        //PERMISOS ATTACHMENT//
        DB::table('permissions')->insert([
            'name'        => 'Crear_Attachment',
            'slug'        => 'crear.attach',
            'description' => 'Añadir attachment al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_Attachment',
            'slug'        => 'leer.attach',
            'description' => 'Leer attachment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_Attachment',
            'slug'        => 'modif.attach',
            'description' => 'Modificar attachment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_Attachment',
            'slug'        => 'eliminar.attach',
            'description' => 'Eliminar attachment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_Attachment',
            'slug'        => 'listar.attach',
            'description' => 'Listar attachment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS ATTACHMENT//


        //PERMISOS CALIFICATION//
        DB::table('permissions')->insert([
            'name'        => 'Crear_Calification',
            'slug'        => 'crear.calif',
            'description' => 'Añadir calification al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_Calification',
            'slug'        => 'leer.calif',
            'description' => 'Leer calification del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_Calification',
            'slug'        => 'modif.calif',
            'description' => 'Modificar Calification del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_Calification',
            'slug'        => 'eliminar.calif',
            'description' => 'Eliminar Calification del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_Calification',
            'slug'        => 'listar.calif',
            'description' => 'Listar Calification del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS CALIFICATION//

        //PERMISOS CLASSROOM//
        DB::table('permissions')->insert([
            'name'        => 'Crear_classroom',
            'slug'        => 'crear.class',
            'description' => 'Añadir classroom al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_classroom',
            'slug'        => 'leer.class',
            'description' => 'Leer classroom del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_classroom',
            'slug'        => 'modif.class',
            'description' => 'Modificar classroom del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_classroom',
            'slug'        => 'eliminar.class',
            'description' => 'Eliminar classroom del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_classroom',
            'slug'        => 'listar.class',
            'description' => 'Listar classroom del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS CLASSROOM//

        //PERMISOS COMMENT//
        DB::table('permissions')->insert([
            'name'        => 'Crear_comment',
            'slug'        => 'crear.comment',
            'description' => 'Añadir comment al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_comment',
            'slug'        => 'leer.comment',
            'description' => 'Leer comment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_comment',
            'slug'        => 'modif.comment',
            'description' => 'Modificar comment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_comment',
            'slug'        => 'eliminar.comment',
            'description' => 'Eliminar comment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_comment',
            'slug'        => 'listar.comment',
            'description' => 'Listar comment del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS COMMENT//

        //PERMISOS COURSE//
        DB::table('permissions')->insert([
            'name'        => 'Crear_course',
            'slug'        => 'crear.course',
            'description' => 'Añadir course al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_course',
            'slug'        => 'leer.course',
            'description' => 'Leer course del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_course',
            'slug'        => 'modif.course',
            'description' => 'Modificar course del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_course',
            'slug'        => 'eliminar.course',
            'description' => 'Eliminar course del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_course',
            'slug'        => 'listar.course',
            'description' => 'Listar course del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS COURSE//

        //PERMISOS EVALUABLE//
        DB::table('permissions')->insert([
            'name'        => 'Crear_evaluable',
            'slug'        => 'crear.evaluable',
            'description' => 'Añadir evaluable al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_evaluable',
            'slug'        => 'leer.evaluable',
            'description' => 'Leer evaluable del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_evaluable',
            'slug'        => 'modif.evaluable',
            'description' => 'Modificar evaluable del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_evaluable',
            'slug'        => 'eliminar.evaluable',
            'description' => 'Eliminar evaluable del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_evaluable',
            'slug'        => 'listar.evaluable',
            'description' => 'Listar evaluable del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS EVALUABLE//

        //PERMISOS EVALUATED//
        DB::table('permissions')->insert([
            'name'        => 'Crear_evaluated',
            'slug'        => 'crear.evaluated',
            'description' => 'Añadir evaluated al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_evaluated',
            'slug'        => 'leer.evaluated',
            'description' => 'Leer evaluated del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_evaluated',
            'slug'        => 'modif.evaluated',
            'description' => 'Modificar evaluated del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_evaluated',
            'slug'        => 'eliminar.evaluated',
            'description' => 'Eliminar evaluated del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_evaluated',
            'slug'        => 'listar.evaluated',
            'description' => 'Listar evaluated del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS EVALUATED//


        //PERMISOS EVALUATION//
        DB::table('permissions')->insert([
            'name'        => 'Crear_evaluation',
            'slug'        => 'crear.evaluation',
            'description' => 'Añadir evaluation al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_evaluation',
            'slug'        => 'leer.evaluation',
            'description' => 'Leer evaluation del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_evaluation',
            'slug'        => 'modif.evaluation',
            'description' => 'Modificar evaluation del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_evaluation',
            'slug'        => 'eliminar.evaluation',
            'description' => 'Eliminar evaluation del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_evaluation',
            'slug'        => 'listar.evaluation',
            'description' => 'Listar evaluation del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS EVALUATION//

        //PERMISOS EVENT//
        DB::table('permissions')->insert([
            'name'        => 'Crear_event',
            'slug'        => 'crear.event',
            'description' => 'Añadir event al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_event',
            'slug'        => 'leer.event',
            'description' => 'Leer event del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_event',
            'slug'        => 'modif.event',
            'description' => 'Modificar event del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_event',
            'slug'        => 'eliminar.event',
            'description' => 'Eliminar event del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_event',
            'slug'        => 'listar.event',
            'description' => 'Listar event del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS EVENT//

        //PERMISOS ITEM//
        DB::table('permissions')->insert([
            'name'        => 'Crear_item',
            'slug'        => 'crear.item',
            'description' => 'Añadir item al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_item',
            'slug'        => 'leer.item',
            'description' => 'Leer item del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_item',
            'slug'        => 'modif.item',
            'description' => 'Modificar item del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_item',
            'slug'        => 'eliminar.item',
            'description' => 'Eliminar item del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_item',
            'slug'        => 'listar.item',
            'description' => 'Listar item del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS ITEM//

        //PERMISOS MESSAGE//
        DB::table('permissions')->insert([
            'name'        => 'Crear_message',
            'slug'        => 'crear.message',
            'description' => 'Añadir message al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_message',
            'slug'        => 'leer.message',
            'description' => 'Leer message del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_message',
            'slug'        => 'modif.message',
            'description' => 'Modificar message del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_message',
            'slug'        => 'eliminar.message',
            'description' => 'Eliminar message del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_message',
            'slug'        => 'listar.message',
            'description' => 'Listar message del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS MESSAGE//


        //PERMISOS MISBEHAVIOR//
        DB::table('permissions')->insert([
            'name'        => 'Crear_misbehavior',
            'slug'        => 'crear.misbehavior',
            'description' => 'Añadir misbehavior al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_misbehavior',
            'slug'        => 'leer.misbehavior',
            'description' => 'Leer misbehavior del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_misbehavior',
            'slug'        => 'modif.misbehavior',
            'description' => 'Modificar misbehavior del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_misbehavior',
            'slug'        => 'eliminar.misbehavior',
            'description' => 'Eliminar misbehavior del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_misbehavior',
            'slug'        => 'listar.misbehavior',
            'description' => 'Listar misbehavior del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS MISBEHAVIOR//


        //PERMISOS PERCENTAGES//
        DB::table('permissions')->insert([
            'name'        => 'Crear_percentages',
            'slug'        => 'crear.percentages',
            'description' => 'Añadir percentages al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_percentages',
            'slug'        => 'leer.percentages',
            'description' => 'Leer percentages del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_percentages',
            'slug'        => 'modif.percentages',
            'description' => 'Modificar percentages del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_percentages',
            'slug'        => 'eliminar.percentages',
            'description' => 'Eliminar percentages del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_percentages',
            'slug'        => 'listar.percentages',
            'description' => 'Listar percentages del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS PERCENTAGES//

        //PERMISOS POST//
        DB::table('permissions')->insert([
            'name'        => 'Crear_post',
            'slug'        => 'crear.post',
            'description' => 'Añadir post al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_post',
            'slug'        => 'leer.post',
            'description' => 'Leer post del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_post',
            'slug'        => 'modif.post',
            'description' => 'Modificar post del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_post',
            'slug'        => 'eliminar.post',
            'description' => 'Eliminar post del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_post',
            'slug'        => 'listar.post',
            'description' => 'Listar post del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS POST//

        //PERMISOS PROGRAM//
        DB::table('permissions')->insert([
            'name'        => 'Crear_program',
            'slug'        => 'crear.program',
            'description' => 'Añadir program al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_program',
            'slug'        => 'leer.program',
            'description' => 'Leer program del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_program',
            'slug'        => 'modif.program',
            'description' => 'Modificar program del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_program',
            'slug'        => 'eliminar.program',
            'description' => 'Eliminar program del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_program',
            'slug'        => 'listar.program',
            'description' => 'Listar program del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS PROGRAM//

        //PERMISOS ROLE//
        DB::table('permissions')->insert([
            'name'        => 'Crear_role',
            'slug'        => 'crear.role',
            'description' => 'Añadir role al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_role',
            'slug'        => 'leer.role',
            'description' => 'Leer role del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_role',
            'slug'        => 'modif.role',
            'description' => 'Modificar role del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_role',
            'slug'        => 'eliminar.role',
            'description' => 'Eliminar role del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_role',
            'slug'        => 'listar.role',
            'description' => 'Listar role del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS ROLE//

        //PERMISOS SEND//
        DB::table('permissions')->insert([
            'name'        => 'Crear_send',
            'slug'        => 'crear.send',
            'description' => 'Añadir send al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_send',
            'slug'        => 'leer.send',
            'description' => 'Leer send del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_send',
            'slug'        => 'modif.send',
            'description' => 'Modificar send del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_send',
            'slug'        => 'eliminar.send',
            'description' => 'Eliminar send del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_send',
            'slug'        => 'listar.send',
            'description' => 'Listar send del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS SEND//

        //PERMISOS SESSION//
        DB::table('permissions')->insert([
            'name'        => 'Crear_session',
            'slug'        => 'crear.session',
            'description' => 'Añadir session al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_session',
            'slug'        => 'leer.session',
            'description' => 'Leer session del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_session',
            'slug'        => 'modif.session',
            'description' => 'Modificar session del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_session',
            'slug'        => 'eliminar.session',
            'description' => 'Eliminar session del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_session',
            'slug'        => 'listar.session',
            'description' => 'Listar session del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS SESSION//

        //PERMISOS STATE//
        DB::table('permissions')->insert([
            'name'        => 'Crear_state',
            'slug'        => 'crear.state',
            'description' => 'Añadir state al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_state',
            'slug'        => 'leer.state',
            'description' => 'Leer state del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_state',
            'slug'        => 'modif.state',
            'description' => 'Modificar state del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_state',
            'slug'        => 'eliminar.state',
            'description' => 'Eliminar state del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_state',
            'slug'        => 'listar.state',
            'description' => 'Listar state del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS STATE//

        //PERMISOS SUBJECT//
        DB::table('permissions')->insert([
            'name'        => 'Crear_subject',
            'slug'        => 'crear.subject',
            'description' => 'Añadir subject al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_subject',
            'slug'        => 'leer.subject',
            'description' => 'Leer subject del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_subject',
            'slug'        => 'modif.subject',
            'description' => 'Modificar subject del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_subject',
            'slug'        => 'eliminar.subject',
            'description' => 'Eliminar subject del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_subject',
            'slug'        => 'listar.subject',
            'description' => 'Listar subject del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS SUBJECT//

        //PERMISOS TASK//
        DB::table('permissions')->insert([
            'name'        => 'Crear_task',
            'slug'        => 'crear.task',
            'description' => 'Añadir task al sistema ',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Leer_task',
            'slug'        => 'leer.task',
            'description' => 'Leer task del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Modificar_task',
            'slug'        => 'modif.task',
            'description' => 'Modificar task del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar_task',
            'slug'        => 'eliminar.task',
            'description' => 'Eliminar task del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Listar_task',
            'slug'        => 'listar.task',
            'description' => 'Listar task del sistema',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //FIN PERMISOS TASK//
    }
}
