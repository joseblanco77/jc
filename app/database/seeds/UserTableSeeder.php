<?php

    use Carbon\Carbon;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $now = Carbon::now('America/Guatemala');

        User::create([
            'realname'      => 'José Blanco',
            'email'         => 'joseblanco77@gmail.com',
            'password'      => Hash::make('jblanco$$12'),
            'dpi'           => '',
            'cellphone'     => '',
            'address'       => '',
            'usertype'      => 1,
            'created_at'    => $now->toDateTimeString()
        ]);

        User::create([
            'realname'      => 'Juan Carlos Umaña',
            'email'         => 'juan.umana@mw.com.gt',
            'password'      => Hash::make('umana&&35'),
            'dpi'           => '',
            'cellphone'     => '',
            'address'       => '',
            'usertype'      => 1,
            'created_at'    => $now->toDateTimeString()
        ]);

        User::create([
            'realname'      => 'Alejandra Ramirez',
            'email'         => 'alejandra.ramirez@mw.com.gt',
            'password'      => Hash::make('ramirez$$68'),
            'dpi'           => '',
            'cellphone'     => '',
            'address'       => '',
            'usertype'      => 1,
            'created_at'    => $now->toDateTimeString()
        ]);

        User::create([
            'realname'      => 'Monica Solorzano',
            'email'         => 'monica.solorzano@mw.com.gt',
            'password'      => Hash::make('monica**56'),
            'dpi'           => '',
            'cellphone'     => '5595 1521',
            'address'       => '',
            'usertype'      => 2,
            'created_at'    => $now->toDateTimeString()
        ]);

        User::create([
            'realname'      => 'Cecilia Altan',
            'email'         => 'cecy.altan@mw.com.gt',
            'password'      => Hash::make('cecilia##08'),
            'dpi'           => '',
            'cellphone'     => '',
            'address'       => '',
            'usertype'      => 2,
            'created_at'    => $now->toDateTimeString()
        ]);

        User::create([
            'realname'      => 'José Mendez',
            'email'         => 'jose.mendez@mw.com.gt',
            'password'      => Hash::make('jose@@44'),
            'dpi'           => '2976061231101',
            'cellphone'     => '3025-3893',
            'address'       => '',
            'usertype'      => 2,
            'created_at'    => $now->toDateTimeString()
        ]);
    }

}

/*

+----------------+------------------+------+-----+---------------------+----------------+
| Field          | Type             | Null | Key | Default             | Extra          |
+----------------+------------------+------+-----+---------------------+----------------+
| id             | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
| realname       | varchar(100)     | NO   |     | NULL                |                |
| email          | varchar(100)     | NO   | UNI | NULL                |                |
| password       | varchar(512)     | NO   |     | NULL                |                |
| dpi            | varchar(16)      | NO   |     | NULL                |                |
| cellphone      | varchar(16)      | NO   |     | NULL                |                |
| address        | varchar(512)     | NO   |     | NULL                |                |
| usertype       | int(11)          | NO   |     | NULL                |                |
| remember_token | varchar(100)     | YES  |     | NULL                |                |
| created_at     | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
| updated_at     | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
+----------------+------------------+------+-----+---------------------+----------------+

 */
