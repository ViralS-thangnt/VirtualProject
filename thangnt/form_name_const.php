<?php
return [
        'parameters' => [
                // modify
                'email_conf'        => 'email_confirmation',
                'telephone_no'=> 'phone',
                'roll'        => 'role_id',     // combobox roles
                'roll'        => 'boss_id',     // combobox bosses
                'start_date'  => 'start',
                'end_date'    => 'end',

                // no change
                'name'        => 'name',
                'kana'        => 'kana',
                'birthday'    => 'birthday',
                'email'       => 'email',
                'note'        => 'note',
                'email_conf'  => 'email_conf',
                'password'    => 'password',
                'submit'      => 'submit',
                'id'          => 'id',

        ],
        'post_datas' => [

                // modify
                'email_conf'    => 'data[email_confirmation]',
                'telephone_no'  => 'data[phone]',
                'roll'          => 'data[role_id]',     // combobox roles
                'roll'          => 'data[boss_id]',     // combobox bosses
                'start_date'    => 'data[start]',
                'end_date'      => 'data[end]',
                
                // no change
                'name'          => 'data[name]',
                'kana'          => 'data[kana]',
                'birthday'      => 'data[birthday]',
                'email'         => 'data[email]',
                'note'          => 'data[note]',
                'employee'      => 'data[employee]',
                'password'      => 'data[password]',
                'submit'        => 'data[submit]',
                'id'            => 'data[id]',

        ],
];


