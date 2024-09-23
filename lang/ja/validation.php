<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'between' => [
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'file'    => ':attributeのファイルサイズは:min KBから:max KBの間でなければなりません。',
        'string'  => ':attributeは:min文字から:max文字の間でなければなりません。',
    ],
    'required' => ':attributeは必須です。',
    'size' => [
        'file' => ':attributeのファイルサイズは:min KB以上である必要があります。',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    // フィールド名に「ドット表記」を使うことで、コンテキストごとに異なる属性名を設定することができます
    'attributes' => [
        'customer.name' => '顧客名',
        'user.name'     => 'ユーザー名',
    ],

];
