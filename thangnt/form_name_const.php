<?php
return [
        'parameters' => [
                'admin'       => 'admin',
                'back'        => 'back',
                'birthday'    => 'birthday',
                'boss'        => 'boss',
                'boss'        => 'boss',
                'email'       => 'email',
                'email_conf'  => 'email_conf',
                'employee'    => 'employee',
                'end_date'    => 'end',
                'kana'        => 'kana',
                'name'        => 'name',
                'note'        => 'note',
                'password'    => 'password',
                'roll'        => 'roll',
                'start_date'  => 'start',
                'submit'      => 'submit',
                'telephone_no'=> 'phone',
        ],
        'post_datas' => [
                'admin'        => 'data[admin]',
                'back'        => 'data[back]',
                'birthday'    => 'data[birthday]',
                'boss'        => 'data[boss]',
                'boss'        => 'data[boss]',
                'email'       => 'data[email]',
                'email_conf'  => 'data[email_conf]',
                'employee'    => 'data[employee]',
                'end'    => 'data[end]',
                'kana'        => 'data[kana]',
                'name'        => 'data[name]',
                'note'        => 'data[note]',
                'password'    => 'data[password]',
                'roll'        => 'data[roll]',
                'start_date'  => 'data[start]',
                'submit'      => 'data[submit]',
                'telephone_no'=> 'data[phone]',
        ],
];

"Trường hợp sử dụng form name ngoài form name được ghi trong spec thì hãy tạo file dưới đây để hỗ trợ test tự động.
/home/edu/test/personal/{your name}/form_name_const.php
return [
    'parameters' => [  //Dùng cho get parameter
        'form name được ghi trong tài liệu' => 'form name mà bạn dùng',
~~~~~~~~~~~~
    ],
    'post_datas' => [  //Dùng cho post data
        'form name được ghi trong tài liệu' => 'form name mà bạn dùng',
~~~~~~~~~~~~
    ],
];

Ex）
<?php
return [
        'parameters' => [
                'admin'        => 'admin',
                'back'        => 'back',
                'birthday'        => 'birthday',
                'boss'        => 'boss',
                'boss'        => 'boss',
                'email'        => 'email',
                'email_conf'        => 'email_conf',
                'employee'        => 'employee',
                'end_date'        => 'end_date',
                'kana'        => 'kana',
                'name'        => 'name',
                'note'        => 'note',
                'password'        => 'password',
                'roll'        => 'roll',
                'start_date'        => 'start_date',
                'submit'        => 'submit',
                'telephone_no'        => 'telephone_no',
        ],
        'post_datas' => [
                'admin'        => 'data[admin]',
                'back'        => 'data[back]',
                'birthday'        => 'data[birthday]',
                'boss'        => 'data[boss]',
                'boss'        => 'data[boss]',
                'email'       => 'data[email]',
                'email_conf'        => 'data[email_conf]',
                'employee'        => 'data[employee]',
                'end_date'        => 'data[end_date]',
                'kana'        => 'data[kana]',
                'name'        => 'data[name]',
                'note'        => 'data[note]',
                'password'        => 'data[password]',
                'roll'        => 'data[roll]',
                'start_date'        => 'data[start_date]',
                'submit'        => 'data[submit]',
                'telephone_no'        => 'data[telephone_no]',
        ],
];
