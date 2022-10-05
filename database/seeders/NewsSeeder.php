<?php

namespace Database\Seeders;

use App\Models\VirtualDataSource_News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    private static array $news_list = [

        // IT ========================================
        [
            'id' => 1,
            'id_category' => 1,
            'title' => 'Попасть в Amazon в 47 лет. История нашего студента',
            'text' => 'Sergejs Jersovs зарабатывал на жизнь частным извозом в Ирландии. ' .
                'Пока однажды, когда ему было 44 года, не решил полностью изменить свою жизнь и стать веб-разработчиком. ' .
                'Начал свой путь в IT он с того, что прошел наш курс «Веб-разработчик с нуля до профи». Меньше чем через полтора ' .
                'года после окончания курса он уже работает в Amazon.',
            'is_private' => false
        ],
        [
            'id' => 2,
            'id_category' => 1,
            'title' => 'Arduino IDE 2.0 вышла из бета-теста',
            'text' => 'Среда разработки Arduino IDE 2.0, предназначенная для написания кода под одноимённое семейство плат с микроконтроллером, вышла из бета-теста. Пользователям доступна стабильная версия с автодополнением кода и тёмной темой.',
            'is_private' => false
        ],
        [
            'id' => 3,
            'id_category' => 1,
            'title' => 'Как Discord прокачивает сетевые диски, сводя задержки к минимуму',
            'text' => 'Не секрет, что именно в Discord сейчас принято вести беседы; каждый день через эту платформу проходит 4 миллиарда сообщений от миллионов людей. На наш взгляд – убедительно.',
            'is_private' => false
        ],

        // Спорт ========================================
        [
            'id' => 4,
            'id_category' => 2,
            'title' => '"Металлург" одержал седьмую победу подряд в КХЛ',
            'text' => '"Металлург" обыграл минское "Динамо" и одержал седьмую победу подряд в КХЛ',
            'is_private' => false
        ],
        [
            'id' => 5,
            'id_category' => 2,
            'title' => 'Нагорный в составе сборной Москвы выиграл Спартакиаду в многоборье',
            'text' => 'Нагорный в составе сборной Москвы стал победителем Спартакиады в многоборье',
            'is_private' => false
        ],
        [
            'id' => 6,
            'id_category' => 2,
            'title' => 'Защитник "Барселоны" Араухо перенесет операцию',
            'text' => 'Защитник "Барселоны" Араухо перенесет операцию из-за разрыва сухожилия бедра',
            'is_private' => false
        ],
        [
            'id' => 7,
            'id_category' => 2,
            'title' => '"Химки" назначили Анара Мамедова спортивным директором',
            'text' => '"Химки" объявили о назначении Анара Мамедова на пост спортивного директора',
            'is_private' => false
        ],

        // Политика ========================================
        [
            'id' => 8,
            'id_category' => 3,
            'title' => 'Фильм "Красная Шапочка" возглавил прокат в России и СНГ за прошедший уикенд',
            'text' => 'Фильм "Красная Шапочка" возглавил прокат в России и СНГ за уикенд, собрав 47 миллионов',
            'is_private' => false
        ],
        [
            'id' => 9,
            'id_category' => 3,
            'title' => 'Драматические и мистические проекты стали победителями "Нового сезона"',
            'text' => 'Козловский и сериал про семейную драму получили призы фестиваля "Новый сезон"',
            'is_private' => false
        ],
        [
            'id' => 10,
            'id_category' => 3,
            'title' => 'Театр имени Моссовета поделился планами на сотый сезон',
            'text' => 'Театр имени Моссовета в 100-м сезоне выпустит девять премьер',
            'is_private' => false
        ],
        [
            'id' => 11,
            'id_category' => 3,
            'title' => 'Актрису Борзову отметили медалью "За труды в культуре и искусстве"',
            'text' => 'Актрису театра и кино Елену Борзову отметили медалью "За труды в культуре и искусстве"',
            'is_private' => false
        ],
        [
            'id' => 12,
            'id_category' => 3,
            'title' => 'Пьесы современных российских драматургов издали в Барселоне',
            'text' => 'Пьесы современных российских драматургов издали в Барселоне на каталонском языке',
            'is_private' => false
        ],

        // Наука ========================================
        [
            'id' => 13,
            'id_category' => 4,
            'title' => 'Ученые создают новый метод переработки побочных продуктов нефтедобычи',
            'text' => 'МОСКВА, 26 сен - РИА Новости. Задачи активного использования вторсырья или различных отходов производства выходят на передний план в мировой экономике. Созданием и улучшением исследовательских решений озабочены многие ученые нашей планеты.',
            'is_private' => false
        ],
        [
            'id' => 14,
            'id_category' => 4,
            'title' => 'Остановили самоуничтожение: найден способ борьбы со смертельными болезнями',
            'text' => 'МОСКВА, 23 сен — РИА Новости, Николай Гурьянов. Новый вид терапии вызвал ремиссию у пациентов с волчанкой — одним из самых тяжелых аутоиммунных заболеваний. Почему такие недуги — бич цивилизованных стран и действительно ли ученые нашли способ спасти организм от самоуничтожения — в материале РИА Новости.',
            'is_private' => false
        ],
        [
            'id' => 15,
            'id_category' => 4,
            'title' => 'Саудовская Аравия планирует отправить в космос первый национальный экипаж',
            'text' => 'Саудовская Аравия отправит в космос женщину в числе первого национального экипажа',
            'is_private' => false
        ],
        [
            'id' => 16,
            'id_category' => 4,
            'title' => 'Эффект куколки. Раскрыта тайна самой странной планеты Солнечной системы',
            'text' => 'МОСКВА, 21 сен — РИА Новости, Николай Гурьянов. Причины, по которым Сатурн выглядит так необычно, долгое время оставались загадкой. Новое исследование дает убедительный ответ на вопрос о формировании колец. Могли бы они появиться у Земли и как бы тогда изменилось наше небо — в материале РИА Новости.',
            'is_private' => false
        ],

        // Туризм ========================================
        [
            'id' => 17,
            'id_category' => 5,
            'title' => 'В России стартовал ресторанный фестиваль',
            'text' => 'В седьмом Ресторанном фестивале примут участие 800 заведений из 55 городов России',
            'is_private' => false
        ],
        [
            'id' => 18,
            'id_category' => 5,
            'title' => 'Директор омской турфирмы получил срок за обман клиентов',
            'text' => 'Директор омской турфирмы получил полтора года колонии за обман 18 клиентов',
            'is_private' => false
        ],
        [
            'id' => 19,
            'id_category' => 5,
            'title' => 'Интересные места Алтая: что посмотреть в Бийске и родном селе Шукшина',
            'text' => 'Начать знакомство с Бийском лучше с улицы Советской. Пройдитесь по ней вечером: на закате старинные здания из красного кирпича приобретают особый яркий оттенок.',
            'is_private' => false
        ],
        [
            'id' => 20,
            'id_category' => 5,
            'title' => 'Путешествие на край света: как отдохнуть на Сахалине',
            'text' => 'Вся красота необъятной России — в фотопроекте #ОткрываяРоссию. Разнообразие природных ландшафтов,',
            'is_private' => false
        ]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $data = [];

        foreach (self::$news_list as $item) {
            $data[] = [
                'id_category' => $item['id_category'],
                'title' => $item['title'],
                'text' => $item['text'],
                'is_private' => $item['is_private']
            ];
        }

        return $data;
    }
}
