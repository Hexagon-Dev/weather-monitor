<?php

return [
	'accepted' => 'Поле :attribute має бути прийнятим.',
	'accepted_if' => 'Поле :attribute має бути прийнятим, коли :other є :value.',
	'active_url' => 'Поле :attribute має бути дійсною URL-адресою.',
	'after' => 'Поле :attribute має бути датою після :date.',
	'after_or_equal' => 'Поле :attribute має бути датою не раніше :date.',
	'alpha' => 'Поле :attribute може містити лише літери.',
	'alpha_dash' => 'Поле :attribute може містити лише літери, цифри, дефіси та підкреслення.',
	'alpha_num' => 'Поле :attribute може містити лише літери та цифри.',
	'array' => 'Поле :attribute має бути масивом.',
	'ascii' => 'Поле :attribute має містити лише однобайтові літерні та символьні символи.',
	'before' => 'Поле :attribute має бути датою до :date.',
	'before_or_equal' => 'Поле :attribute має бути датою до або рівною :date.',
	'between' => [
		'array' => 'Поле :attribute має містити від :min до :max елементів.',
		'file' => 'Поле :attribute має бути від :min до :max кілобайтів.',
		'numeric' => 'Поле :attribute має бути від :min до :max.',
		'string' => 'Поле :attribute має містити від :min до :max символів.',
	],
	'boolean' => 'Поле :attribute має бути true або false.',
	'can' => 'Поле :attribute містить несанкціоноване значення.',
	'confirmed' => 'Підтвердження для поля :attribute не співпадає.',
	'contains' => 'Поле :attribute відсутнє обов\'язкове значення.',
	'current_password' => 'Пароль неправильний.',
	'date' => 'Поле :attribute має бути дійсною датою.',
	'date_equals' => 'Поле :attribute має бути датою, рівною :date.',
	'date_format' => 'Поле :attribute має відповідати формату :format.',
	'decimal' => 'Поле :attribute має містити :decimal десяткових знаків.',
	'declined' => 'Поле :attribute має бути відхилене.',
	'declined_if' => 'Поле :attribute має бути відхилене, коли :other є :value.',
	'different' => 'Поле :attribute та :other мають бути різними.',
	'digits' => 'Поле :attribute має бути :digits цифр.',
	'digits_between' => 'Поле :attribute має містити від :min до :max цифр.',
	'dimensions' => 'Поле :attribute має неправильні розміри зображення.',
	'distinct' => 'Поле :attribute має повторюване значення.',
	'doesnt_end_with' => 'Поле :attribute не повинно закінчуватись одним із наступних значень: :values.',
	'doesnt_start_with' => 'Поле :attribute не повинно починатись з одного із наступних значень: :values.',
	'email' => 'Поле :attribute має бути дійсною електронною адресою.',
	'ends_with' => 'Поле :attribute має закінчуватись одним із наступних значень: :values.',
	'enum' => 'Вибране значення для :attribute неправильне.',
	'exists' => 'Вибране значення для :attribute неправильне.',
	'extensions' => 'Поле :attribute має містити файл одного з наступних типів: :values.',
	'file' => 'Поле :attribute має бути файлом.',
	'filled' => 'Поле :attribute має містити значення.',
	'gt' => [
		'array' => 'Поле :attribute має містити більше ніж :value елементів.',
		'file' => 'Поле :attribute має бути більше ніж :value кілобайтів.',
		'numeric' => 'Поле :attribute має бути більше ніж :value.',
		'string' => 'Поле :attribute має бути більше ніж :value символів.',
	],
	'gte' => [
		'array' => 'Поле :attribute має містити :value елементів або більше.',
		'file' => 'Поле :attribute має бути більше або рівне :value кілобайтів.',
		'numeric' => 'Поле :attribute має бути більше або рівне :value.',
		'string' => 'Поле :attribute має бути більше або рівне :value символів.',
	],
	'hex_color' => 'Поле :attribute має бути дійсним шістнадцятковим кольором.',
	'image' => 'Поле :attribute має бути зображенням.',
	'in' => 'Вибране значення для :attribute неправильне.',
	'in_array' => 'Поле :attribute має існувати в :other.',
	'integer' => 'Поле :attribute має бути цілим числом.',
	'ip' => 'Поле :attribute має бути дійсною IP-адресою.',
	'ipv4' => 'Поле :attribute має бути дійсною IPv4-адресою.',
	'ipv6' => 'Поле :attribute має бути дійсною IPv6-адресою.',
	'json' => 'Поле :attribute має бути дійсною JSON-строкою.',
	'list' => 'Поле :attribute має бути списком.',
	'lowercase' => 'Поле :attribute має бути малими літерами.',
	'lt' => [
		'array' => 'Поле :attribute має містити менше ніж :value елементів.',
		'file' => 'Поле :attribute має бути менше ніж :value кілобайтів.',
		'numeric' => 'Поле :attribute має бути менше ніж :value.',
		'string' => 'Поле :attribute має бути менше ніж :value символів.',
	],
	'lte' => [
		'array' => 'Поле :attribute не повинно містити більше ніж :value елементів.',
		'file' => 'Поле :attribute має бути менше або рівне :value кілобайтів.',
		'numeric' => 'Поле :attribute має бути менше або рівне :value.',
		'string' => 'Поле :attribute має бути менше або рівне :value символів.',
	],
	'mac_address' => 'Поле :attribute має бути дійсною MAC-адресою.',
	'max' => [
		'array' => 'Поле :attribute не повинно містити більше ніж :max елементів.',
		'file' => 'Поле :attribute не повинно бути більше ніж :max кілобайтів.',
		'numeric' => 'Поле :attribute не повинно бути більше ніж :max.',
		'string' => 'Поле :attribute не повинно бути більше ніж :max символів.',
	],
	'max_digits' => 'Поле :attribute не повинно містити більше ніж :max цифр.',
	'mimes' => 'Поле :attribute має бути файлом типу: :values.',
	'mimetypes' => 'Поле :attribute має бути файлом типу: :values.',
	'min' => [
		'array' => 'Поле :attribute має містити щонайменше :min елементів.',
		'file' => 'Поле :attribute має бути щонайменше :min кілобайтів.',
		'numeric' => 'Поле :attribute має бути щонайменше :min.',
		'string' => 'Поле :attribute має містити щонайменше :min символів.',
	],
	'min_digits' => 'Поле :attribute має містити щонайменше :min цифр.',
	'missing' => 'Поле :attribute має бути відсутнє.',
	'missing_if' => 'Поле :attribute має бути відсутнє, коли :other є :value.',
	'missing_unless' => 'Поле :attribute має бути відсутнє, якщо :other не є :value.',
	'missing_with' => 'Поле :attribute має бути відсутнє, коли :values присутні.',
	'missing_with_all' => 'Поле :attribute має бути відсутнє, коли :values присутні.',
	'multiple_of' => 'Поле :attribute має бути кратним :value.',
	'not_in' => 'Вибране значення для :attribute неправильне.',
	'not_regex' => 'Формат поля :attribute неправильний.',
	'numeric' => 'Поле :attribute має бути числом.',
	'password' => [
		'letters' => 'Поле :attribute має містити щонайменше одну літеру.',
		'mixed' => 'Поле :attribute має містити щонайменше одну велику та одну малу літеру.',
		'numbers' => 'Поле :attribute має містити щонайменше одну цифру.',
		'symbols' => 'Поле :attribute має містити щонайменше один символ.',
		'uncompromised' => 'Наданий :attribute був знайдений у витоку даних. Будь ласка, оберіть інший :attribute.',
	],
	'present' => 'Поле :attribute має бути присутнє.',
	'present_if' => 'Поле :attribute має бути присутнє, коли :other є :value.',
	'present_unless' => 'Поле :attribute має бути присутнє, якщо :other не є :value.',
	'present_with' => 'Поле :attribute має бути присутнє, коли :values присутні.',
	'present_with_all' => 'Поле :attribute має бути присутнє, коли :values присутні.',
	'prohibited' => 'Поле :attribute заборонено.',
	'prohibited_if' => 'Поле :attribute заборонено, коли :other є :value.',
	'prohibited_unless' => 'Поле :attribute заборонено, якщо :other не є в :values.',
	'prohibits' => 'Поле :attribute забороняє присутність :other.',
	'regex' => 'Формат поля :attribute неправильний.',
	'required' => 'Поле :attribute обов\'язкове.',
	'required_array_keys' => 'Поле :attribute має містити записи для: :values.',
	'required_if' => 'Поле :attribute обов\'язкове, коли :other є :value.',
	'required_if_accepted' => 'Поле :attribute обов\'язкове, коли :other прийняте.',
	'required_if_declined' => 'Поле :attribute обов\'язкове, коли :other відхилене.',
	'required_unless' => 'Поле :attribute обов\'язкове, якщо :other не є в :values.',
	'required_with' => 'Поле :attribute обов\'язкове, коли :values присутні.',
	'required_with_all' => 'Поле :attribute обов\'язкове, коли :values присутні.',
	'required_without' => 'Поле :attribute обов\'язкове, коли :values відсутні.',
	'required_without_all' => 'Поле :attribute обов\'язкове, коли жодне з :values не присутнє.',
	'same' => 'Поле :attribute та :other мають співпадати.',
	'size' => [
		'array' => 'Поле :attribute має містити :size елементів.',
		'file' => 'Поле :attribute має бути :size кілобайтів.',
		'numeric' => 'Поле :attribute має бути :size.',
		'string' => 'Поле :attribute має містити :size символів.',
	],
	'starts_with' => 'Поле :attribute має починатися з одного з наступних значень: :values.',
	'string' => 'Поле :attribute має бути строкою.',
	'timezone' => 'Поле :attribute має бути дійсною часовою зоною.',
	'unique' => 'Поле :attribute вже використовується.',
	'uploaded' => 'Поле :attribute не вдалося завантажити.',
	'uppercase' => 'Поле :attribute має бути великими літерами.',
	'url' => 'Поле :attribute має бути дійсною URL-адресою.',
	'ulid' => 'Поле :attribute має бути дійсним ULID.',
	'uuid' => 'Поле :attribute має бути дійсним UUID.',

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	'attributes' => [],
];