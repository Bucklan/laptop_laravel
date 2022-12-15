<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the жарамдыator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute қабылдау керек.',
    'accepted_if' => ':attribute қашан қабылдануы керек :other болып табылады :value.',
    'active_url' => ':attribute бұл жарамсыз URL.',
    'after' => ':attribute кейін кездесу болуы керек :date.',
    'after_or_equal' => ':attribute кейін кездесу болуы керек немесе тең :date.',
    'alpha' => ':attribute тек әріптер болуы керек.',
    'alpha_dash' => ':attribute тек әріптер, сандар, сызықшалар мен астын сызу керек.',
    'alpha_num' => ':attribute тек әріптер мен сандарды қамтуы керек.',
    'array' => ':attribute бұл массив болуы керек.',
    'before' => ':attribute бұрын кездесу болуы керек :date.',
    'before_or_equal' => ':attribute алдыңғы немесе тең күн болуы керек :date.',
    'between' => [
        'array' => ':attribute арасында болуы керек :min жане :max',
        'file' => ':attribute арасында болуы керек :min жане :max килобайттар.',
        'numeric' => ':attribute арасында болуы керек :min жане :max.',
        'string' => ':attribute арасында болуы керек :min жане :max кейіпкерлер.',
    ],
    'boolean' => ':attribute өріс шын немесе жалған болуы керек.',
    'confirmed' => ':attribute растау бірдей емес.',
    'current_password' => 'құпия сөз дұрыс емес.',
    'date' => ':attribute бұл жарамсыз күн.',
    'date_equals' => ':attribute күн тең болуы керек :date.',
    'date_format' => ':attribute форматқа сәйкес келмейді :format.',
    'declined' => ':attribute қабылданбауы керек.',
    'declined_if' => ':attribute қашан қабылданбауы керек :other болып табылады :value.',
    'different' => ':attribute және :other бәрі басқаша болуы керек.',
    'digits' => ':attribute болуы керек :digits сандар.',
    'digits_between' => ':attribute арасында болуы керек :min және :max сандар.',
    'dimensions' => ':attribute жарамсыз кескін өлшемдері бар.',
    'distinct' => ':attribute өрістің қайталанатын мәні бар.',
    'doesnt_end_with' => ':attribute төмендегілердің бірімен аяқталмауы мүмкін: :values.',
    'doesnt_start_with' => ':attribute төмендегілердің бірінен басталмауы мүмкін: :values.',
    'email' => ' :attribute дұрыс мәні берілмеген.',
    'ends_with' => ':attribute төмендегілердің бірімен аяқталуы керек: :values.',
    'enum' => 'таңдалған :attribute жарамсыз болып табылады.',
    'exists' => 'таңдалған :attribute жарамсыз болып табылады.',
    'file' => ':attribute бұл файл болуы керек.',
    'filled' => ':attribute өріс маңызды болуы керек.',
    'gt' => [
        'array' => ':attribute артық болуы керек :value заттар.',
        'file' => ':attribute артық болуы керек :value килобайттар.',
        'numeric' => ':attribute артық болуы керек :value.',
        'string' => ':attribute артық болуы керек :value кейіпкерлер.',
    ],
    'gte' => [
        'array' => ':attribute must have :value заттар or more.',
        'file' => ':attribute артық болуы керек немесе тең :value килобайттар.',
        'numeric' => ':attribute артық болуы керек немесе тең :value.',
        'string' => ':attribute артық болуы керек немесе тең :value кейіпкерлер.',
    ],
    'image' => ':attribute бұл сурет болуы керек.',
    'in' => 'таңдалған :attribute жарамсыз болып табылады.',
    'in_array' => ':attribute өріс жоқ :other.',
    'integer' => ':attribute бүтін сан болуы керек.',
    'ip' => ':attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => ':attribute болуы керек жарамды IPv4 адрес.',
    'ipv6' => ':attribute болуы керек жарамды IPv6 адрес.',
    'json' => ':attribute болуы керек жарамды JSON соз.',
    'lt' => [
        'array' => ':attribute аз болуы керек, :value қарағанда.',
        'file' => ':attribute аз болуы керек, :value қарағанда .',
        'numeric' => ':attribute аз болуы керек, :value қарағанда.',
        'string' => ':attribute аз болуы керек, :value қарағанда.',
    ],
    'lte' => [
        'array' => ':attribute :value заттардан көп болмауы керек.',
        'file' => ':attribute :value килобайттан аз немесе тең болуы керек .',
        'numeric' => ':attribute :value ден аз немесе тең болуы керек .',
        'string' => ':attribute :value кейіпкерлерден аз немесе тең болуы керек.',
    ],
    'mac_address' => ':attribute жарамды MAC мекенжайы болуы керек.',
    'max' => [
        'array' => ':attribute артық болмауы керек :max заттар.',
        'file' => ':attribute артық болмауы керек :max Килобайттан.',
        'numeric' => ':attribute бұдан артық болмауы керек :max.',
        'string' => ':attribute бұдан артық болмауы керек :max кейіпкерлерінен.',
    ],
    'max_digits' => ':attribute артық болмауы керек :max сандары.',
    'mimes' => ':attribute :values файл түрі болуы керек.',
    'mimetypes' => ':attribute :values файл түрі болуы керек.',
    'min' => [
        'array' => ':attribute кем дегенде болуы керек :min элементтері.',
        'file' => ':attribute кем дегенде болуы керек :min Килобайт.',
        'numeric' => ':attribute кем дегенде болуы керек :min.',
        'string' => ':attribute кем дегенде болуы керек :min .',
    ],
    'min_digits' => ':attribute кем дегенде болуы керек :min сандары.',
    'multiple_of' => ':attribute бірнеше болуы керек :value.',
    'not_in' => 'таңдалған :attribute жарамсыз болып табылады.',
    'not_regex' => ':attribute пішім жарамсыз.',
    'numeric' => ':attribute бұл сан болуы керек.',
    'password' => [
        'letters' => ':attribute кем дегенде бір әріп болуы керек.',
        'mixed' => ':attribute кем дегенде бір бас әріп пен бір кіші әріп болуы керек.',
        'numbers' => ':attribute кем дегенде бір сан болуы керек.',
        'symbols' => ':attribute кем дегенде бір таңбадан тұруы керек.',
        'uncompromised' => 'көрсетілген :attribute деректердің бұзылуы нәтижесінде пайда болды. Басқасын таңдаңыз :attribute.',
    ],
    'present' => ':attribute өріс болуы керек.',
    'prohibited' => ':attribute өріске тыйым салынған.',
    'prohibited_if' => ':attribute өріске тыйым салынған, егер :other болсв :value.',
    'prohibited_unless' => ':attributeөріске тыйым салынған, егер :other болса :values.',
    'prohibits' => ':attribute өріс тыйым салады :other қатысудан.',
    'regex' => ':attribute пішім жарамсыз.',
    'required' => 'Өріс :attribute толтыру үшін міндетті.',
    'required_array_keys' => ':attribute өрісте жазбалар болуы керек: :values.',
    'required_if' => ':attribute өріс қашан міндетті болып табылады :other болса :value.',
    'required_unless' => ':attribute өріс міндетті болып табылады, егер :other болса :values.',
    'required_with' => ':attribute өріс қашан міндетті болып табылады :values бар.',
    'required_with_all' => ':attribute өріс қашан міндетті болып табылады :values.',
    'required_without' => ':attribute өріс қашан міндетті болып табылады :values.',
    'required_without_all' => ':attribute өріс қашан міндетті болып табылады егер біреуі де емес :values бар.',
    'same' => ':attribute жане :other сәйкес келуі керек.',
    'size' => [
        'array' => ':attribute құрамында болуы керек :size заттар.',
        'file' => ':attribute болуы керек :size килобайттар.',
        'numeric' => ':attribute болуы керек :size.',
        'string' => ':attribute болуы керек :size кейіпкерлер.',
    ],
    'starts_with' => ':attribute басталу керек: :values ден.',
    'string' => ':attribute болуы керек осы өс.',
    'timezone' => ':attribute рұқсат етілген уақыт белдеуі болуы керек.',
    'unique' => ':attribute бұндай бар .',
    'uploaded' => ':attribute сақтау мүмкін болмады.',
    'url' => ':attribute жарамды URL болуы керек.',
    'uuid' => ':attribute UUID рұқсат етілген болуы керек.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom жарамдыation messages for attributes using the
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
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
