<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должно быть принято.',
    'accepted_if' => ':attribute должно быть принято, когда :other является :value.',
    'active_url' => ':attribute это недопустимый URL-адрес.',
    'after' => ':attribute должно быть, свидание после :date.',
    'after_or_equal' => ':attribute должна быть дата после или равная :date.',
    'alpha' => ':attribute должен содержать только буквы.',
    'alpha_dash' => ':attribute должен содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute должен содержать только буквы и цифры.',
    'array' => ':attribute должно быть, это массив.',
    'before' => ':attribute должно быть свидание до :date.',
    'before_or_equal' => ':attribute должна быть дата, предшествующая или равная :date.',
    'between' => [
        'array' => ':attribute должно быть между :min и :max предметы.',
        'file' => ':attribute должно быть между :min и :max килобайты.',
        'numeric' => ':attribute должно быть между :min и :max.',
        'string' => ':attribute должно быть между :min и :max персонажи.',
    ],
    'boolean' => ':attribute поле должно быть true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'неверный пароль.',
    'date' => ':attribute это недействительная дата.',
    'date_equals' => ':attribute должна быть дата, равная :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'declined' => ':attribute должно быть отклонено.',
    'declined_if' => ':attribute должно быть отклонено, когда :other является :value.',
    'different' => ':attribute и :other должно быть, все по-другому.',
    'digits' => ':attribute must be :digits цифры.',
    'digits_between' => ':attribute должно быть между :min и :max цифры.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute поле имеет повторяющееся значение.',
    'doesnt_end_with' => ':attribute может не заканчиваться одним из следующих: :values.',
    'doesnt_start_with' => ':attribute может не начинаться с одного из следующих: :values.',
    'email' => ':attribute должно быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должно заканчиваться одним из следующих: :values.',
    'enum' => 'выбранный :attribute является недействительным.',
    'exists' => 'выбранный :attribute является недействительным.',
    'file' => ':attribute должно быть, файл.',
    'filled' => ':attribute поле должно иметь значение.',
    'gt' => [
        'array' => ':attribute должно быть больше, чем :value предметы.',
        'file' => ':attribute должно быть больше, чем :value килобайты.',
        'numeric' => ':attribute должно быть больше, чем :value.',
        'string' => ':attribute должно быть больше, чем :value персонажи.',
    ],
    'gte' => [
        'array' => ':attribute необходимо иметь :value предметы или больше.',
        'file' => ':attribute должно быть больше или равно :value килобайты.',
        'numeric' => ':attribute должно быть больше или равно :value.',
        'string' => ':attribute должно быть больше или равно :value персонажи.',
    ],
    'image' => ':attribute должно быть, это образ.',
    'in' => 'выбранный :attribute является недействительным.',
    'in_array' => ':attribute поле не существует в :other.',
    'integer' => ':attribute должно быть целым числом.',
    'ip' => ':attribute должно быть действительным IP адрес.',
    'ipv4' => ':attribute должно быть действительным IPv4 адрес.',
    'ipv6' => ':attribute должно быть действительным IPv6 адрес.',
    'json' => ':attribute должно быть действительным JSON строка.',
    'lt' => [
        'array' => ':attribute должно быть меньше, чем :value предметы.',
        'file' => ':attribute должно быть меньше, чем :value килобайты.',
        'numeric' => ':attribute должно быть меньше, чем :value.',
        'string' => ':attribute должно быть меньше, чем :value персонажи.',
    ],
    'lte' => [
        'array' => ':attribute должно быть не более :value предметы.',
        'file' => ':attribute должно быть меньше или равно :value килобайты.',
        'numeric' => ':attribute должно быть меньше или равно :value.',
        'string' => ':attribute должно быть меньше или равно :value персонажи.',
    ],
    'mac_address' => ':attribute должен быть действительный MAC-адрес.',
    'max' => [
        'array' => ':attribute должно быть не более :max предметы.',
        'file' => ':attribute не должно быть больше, чем :max килобайты.',
        'numeric' => ':attribute не должно быть больше, чем :max.',
        'string' => ':attribute не должно быть больше, чем :max персонажи.',
    ],
    'max_digits' => ':attribute должно быть не более :max цифры.',
    'mimes' => ':attribute должен быть файл типа: :values.',
    'mimetypes' => ':attribute должен быть файл типа: :values.',
    'min' => [
        'array' => ':attribute должен иметь по крайней мере :min предметы.',
        'file' => ':attribute должно быть, по крайней мере :min килобайты.',
        'numeric' => ':attribute должно быть, по крайней мере :min.',
        'string' => ':attribute должен содержать не менее :min символов.',
    ],
    'min_digits' => ':attribute должен иметь по крайней мере :min цифры.',
    'multiple_of' => ':attribute должно быть кратно :value.',
    'not_in' => 'выбранный :attribute является недействительным.',
    'not_regex' => ':attribute формат недопустим.',
    'numeric' => ':attribute должно быть, это число.',
    'password' => [
        'letters' => ':attribute должно содержать хотя бы одну букву.',
        'mixed' => ':attribute должно содержать по крайней мере одну заглавную и одну строчную букву.',
        'numbers' => ':attribute должен содержать хотя бы одно число.',
        'symbols' => ':attribute должен содержать хотя бы один символ.',
        'uncompromised' => 'указанный :attribute появился в результате утечки данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => ':attribute поле должно присутствовать.',
    'prohibited' => ':attribute поле запрещено.',
    'prohibited_if' => ':attribute поле запрещено, когда :other является :value.',
    'prohibited_unless' => ':attribute поле запрещено, если только :other в :values.',
    'prohibits' => ':attribute поле запрещает :other от присутствия.',
    'regex' => ':attribute формат недопустим.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => ':attribute поле должно содержать записи для: :values.',
    'required_if' => ':attribute поле является обязательным, когда :other является :value.',
    'required_unless' => ':attribute поле является обязательным, если только :other в :values.',
    'required_with' => ':attribute поле является обязательным, когда :values присутствует.',
    'required_with_all' => ':attribute поле является обязательным, когда :values нет.',
    'required_without' => ':attribute поле является обязательным, когда :values нет.',
    'required_without_all' => ':attribute поле является обязательным, когда ни один из :values присутствуют.',
    'same' => ':attribute и :other должно совпадать.',
    'size' => [
        'array' => ':attribute должен содержать :size предметы.',
        'file' => ':attribute должен быть :size килобайтоы.',
        'numeric' => ':attribute должен быть :size.',
        'string' => ':attribute должен быть :size персонажи.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values.',
    'string' => ':attribute должно быть, это строка.',
    'timezone' => ':attribute должен быть допустимым часовым поясом.',
    'unique' => ':attribute уже есть такое.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => ':attribute должен быть допустимым URL-адресом.',
    'uuid' => ':attribute должен быть допустимым UUID.',

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
    | following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
